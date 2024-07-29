<x-card>
    <div class="flex items-center justify-between mb-2">
        <h2 class="font-bold first-letter:uppercase truncate">{{ $post->title }}</h2>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </div>
    {{ $slot }}
</x-card>
