<div class="border border-gray-600 rounded-xl px-6 py-4 bg-gray-300">
    <div class="flex items-center justify-between mb-2">
        <h2 class="font-bold first-letter:uppercase">{{ $post->title }}</h2>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </div>
    {{ $slot }}
</div>
