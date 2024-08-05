<x-card>
    <h3 class="text-xs italic">
        {{ ['wierszem_pisane' => 'Wierszem Pisane', 'scenariusze_pisane_życiem' => 'Scenariusze Pisane Życiem', 'z_medycznego_punktu_widzenia' => 'Z Medycznego Punktu Widzenia', 'taniec' => 'Taniec'][$post->type] }}
    </h3>
    <div class="flex items-center justify-between mb-2">
        <h2 class="font-bold first-letter:uppercase truncate">{{ $post->title }}</h2>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </div>
    {{ $slot }}
</x-card>
