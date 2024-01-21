<script setup>
import { Head } from "@inertiajs/vue3";
import {
    Pagination,
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeadCell,
    TableRow,
} from "flowbite-vue";
import { computed, ref } from "vue";

const props = defineProps(["link", "stats", "unique_view", "rank"]);

const tableHeaders = ref(["Viewed At", "IP Address"]);

const currentPage = ref(1);
const perPage = ref(15);

const displayedRows = computed(() => {
    if (!props.stats) return [];

    const startIndex = (currentPage.value - 1) * perPage.value;
    const endIndex = startIndex + perPage.value;

    return props.stats.slice(startIndex, endIndex);
});

const dateOptions = { dateStyle: "full", timeStyle: "long" };
</script>



<template>
  <div>
    <Head :title="link.code + 'stats'" />

    <div class="flex flex-col h-screen overflow-hidden">
      <header class="">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            Shortened link :{{ link.code }} Stats
          </h1>
        </div>
      </header>

      <div class="mx-auto container max-w-7xl py-3 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Statistics</h2>
        <div class="grid gap-6 mb-6 md:grid-cols-2 xl:grid-cols-3">
          <!-- Total Views -->
          <div class="min-w-0 rounded-lg shadow-md overflow-hidden bg-white">
            <div class="p-4 border border-black">
              <p class="text-sm font-medium text-gray-600 mb-2">Total Views</p>
              <p class="text-lg font-semibold text-gray-700">{{ stats.length }}</p>
            </div>
          </div>

          <!-- Unique Clicks -->
          <div class="min-w-0 rounded-lg shadow-md overflow-hidden bg-white">
            <div class="p-4 border border-black">
              <p class="text-sm font-medium text-gray-600 mb-2">Unique Clicks</p>
              <p class="text-lg font-semibold text-gray-700">{{ unique_view }}</p>
            </div>
          </div>

          <!-- Rank -->
          <div class="min-w-0 rounded-lg shadow-md overflow-hidden bg-white">
            <div class="p-4 border border-black">
              <p class="text-sm font-medium text-gray-600 mb-2">Rank</p>
              <p class="text-lg font-semibold">{{ rank }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mx-auto container max-w-7xl py-3 sm:px-6 lg:px-8">
        <div class="space-y-12 p-4">
          <Table class="table-auto border border-gray-700 border-collapse" striped>
            <TableHead class="text-black">
              <TableHeadCell class="border border-slate-300">#ID</TableHeadCell>
              <template v-for="(header, index) in tableHeaders" :key="index">
                <TableHeadCell class="text-left border border-slate-300">{{ header }}</TableHeadCell>
              </template>
            </TableHead>

            <TableBody>
              <template v-for="(link, index) in displayedRows" :key="index">
                <TableRow>
                  <TableCell class="px-6 py-3 border border-slate-300">{{ link.id }}</TableCell>
                  <TableCell class="border border-slate-300">
                    <p class="font-medium">
                      {{
                        new Date(link.created_at).toLocaleString("fr-FR", dateOptions)
                      }}
                    </p>
                  </TableCell>
                  <TableCell class="border border-slate-300">
                    <p>{{ link.visitor }}</p>
                  </TableCell>
                </TableRow>
              </template>
            </TableBody>
          </Table>

          <div class="p-6 flex items-center justify-center text-center">
            <Pagination v-model="currentPage" :per-page="perPage" :total-items="stats.length" :layout="'table'" show-icons />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Add your custom styles here if needed */
</style>

