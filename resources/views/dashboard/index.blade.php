<x-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <h1 class="text-3xl font-bold text-center text-white mb-4">Panel sterowania</h1>
    <div class="flex flex-col gap-4">
        <x-charts.visits :visitsData='$visitsData' />
    </div>
</x-layout>
