<x-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>


    <h1 class="text-3xl font-bold text-center text-white mb-4">Posty</h1>
    <form action="{{ route('dashboard.posts') }}" method="GET" class="mb-6">
        <x-card>
            <div class="mb-4">
                <x-label for="search">Szukaj</x-label>
                <x-text-input name="search" placeholder="Wyszukaj po tytule albo treści" value="{{ old('search') }}" />
            </div>
            <div class="flex gap-4">
                <div class="grow">
                    <x-label for="type">Typ</x-label>
                    <select name="type" id="type" class="rounded-md border border-black px-2 w-full">
                        <option value="all" class="w-full"
                            {{ request()->query('type') === 'all' ? 'selected' : '' }}>
                            Wszystkie
                        </option>
                        @foreach (['wierszem_pisane' => 'Wierszem Pisane', 'scenariusze_pisane_życiem' => 'Scenariusze Pisane Życiem', 'z_medycznego_punktu_widzenia' => 'Z Medycznego Punktu Widzenia', 'taniec' => 'Taniec'] as $key => $value)
                            <option value="{{ $key }}"
                                {{ request()->query('type') === $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="grow">
                    <x-label for="sort">Sortuj</x-label>
                    <select name="sort" id="sort" value="{{ old('sort') }}"
                        class="w-full rounded-md border border-black px-2">
                        @foreach (['all' => 'Wszystkie', 'title-za' => 'A do Z', 'title-az' => 'Z do A', 'views-most' => 'Wyświetlenia ↑', 'views-least' => 'Wyświetlenia ↓', 'comments-most' => 'Komentarze ↑', 'comments-least' => 'Komentarze ↓'] as $key => $value)
                            <option value="{{ $key }}" class="w-full"
                                {{ request()->query('sort') === $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="text-center bg-white py-2 px-6 flex gap-2 items-center">
                    Szukaj
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="h-4">
                        <path
                            d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
                    </svg>
                </button>
            </div>
        </x-card>
    </form>
    <div class="flex flex-col gap-2">
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
