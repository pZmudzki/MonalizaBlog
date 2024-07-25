<x-layout>
    <ul class="flex flex-col gap-4">
        @forelse ($posts as $post)
            <li>
                <x-post-card :post="$post">
                    <div class="line-clamp-5 mb-4">
                        {{ $post->content }}
                    </div>
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
            </li>
        @empty
            <li>Nie ma żadnych postów.</li>
        @endforelse
    </ul>
</x-layout>
