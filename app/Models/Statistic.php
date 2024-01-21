<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = ['short_link_id', 'visitor'];

    /**
     * Inverse relation
     * @return BelongsTo
     */
    public function link(): BelongsTo
    {
        return $this->belongsTo(ShortLink::class);
    }

    /**
     * @return mixed|void
     */
    public static function  getMostClickedUrl()
    {
        $element = DB::table('statistics')
            ->select('short_link_id', DB::raw('COUNT(*) as row_count'))
            ->groupBy('short_link_id')
            ->orderByDesc('row_count')
            ->first();

        if ($element)
            return $element->short_link_id;
    }

    /**
     * Get the rank of a given link
     * @param $link
     * @return bool|int
     */
    public static function getRank($link): bool|int
    {
        $rank = DB::table('statistics')
            ->select('short_link_id', DB::raw('COUNT(*) as count'))
            ->groupBy('short_link_id')
            ->orderByDesc('count')
            ->pluck('short_link_id')
            ->search($link);

        return $rank + 1;
    }
}
