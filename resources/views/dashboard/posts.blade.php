<x-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <nav>
        <ul>
            <a href="{{ route('dashboard.posts') }}">Posty</a>
        </ul>
    </nav>
    <h1 class="text-3xl font-bold text-center text-white mb-4">Posty</h1>
    <div class="flex flex-col gap-4">
        @forelse ($posts as $post)
            <x-post-card :post="$post">
                <div class="flex gap-2 items-center justify-between">
                    <div>
                        <span>Comments: {{ $post->comments_count }}</span>
                        <span>Views: {{ $post->views_count }}</span>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('post.show', $post) }}" class="text-blue-700">Show more</a>
                        @if (auth()->user())
                            <a href="{{ route('post.edit', $post) }}" class="text-blue-700">Edytuj
                                post</a>
                        @endif
                    </div>
                </div>
            </x-post-card>
        @empty
            <p>Nie ma jeszcze żadnych postów</p>
        @endforelse
    </div>
</x-layout>
