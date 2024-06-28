<x-layout>
    <ul class="flex flex-col gap-4">
        @forelse ($posts as $post)
            <li>
                <x-post-card :post="$post" class="bg-gray-300">
                    <div class="line-clamp-5 mb-4">
                        {{ $post->content }}
                    </div>
                    <div class="flex gap-2 items-center justify-around">
                        <span>Comments: 0</span>
                        <span>Views: 0</span>
                    </div>
                </x-post-card>
            </li>
        @empty
            <li>Nie ma żadnych postów.</li>
        @endforelse
    </ul>
</x-layout>
