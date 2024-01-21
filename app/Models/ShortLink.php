<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'code', 'ip_address'];

    /**
     * Relation with a Statistic model
     * @return HasMany
     */
    public function statistics(): HasMany
    {
        return $this->hasMany(Statistic::class);
    }
}
