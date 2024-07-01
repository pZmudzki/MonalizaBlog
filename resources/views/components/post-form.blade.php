<x-layout>
    <x-card>
        <form action="{{ $post ? route('post.update') : route('post.store') }}" method="POST"
            enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col">
                <label for="title">Tytuł:</label>
                <input type="text" name="title" id="title" value="{{ $post->title ?? old('title') }}"
                    class="rounded-md border border-black px-2">
            </div>
            <div class="flex flex-col">
                <label for="content">Treść:</label>
                <textarea name="content" id="content" class="rounded-md border border-black px-2" rows="5">
                    {{ $post->content ?? old('content') }}
                  </textarea>
            </div>
            <div class="flex flex-col">
                <label for="type">Typ:</label>
                <select name="type" id="type" value="{{ $post->type ?? old('type') }}"
                    class="rounded-md border border-black px-2">
                    @foreach (['wierszem_pisane' => 'Wierszem Pisane', 'scenariusze_pisane_życiem' => 'Scenariusze Pisane Życiem', 'z_medycznego_punktu_widzenia' => 'Z Medycznego Punktu Widzenia', 'taniec' => 'Taniec'] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="images">Zdjęcia:</label>
                <input type="file" name="images" accept="image/*" multiple id="images"
                    value="{{ old('images') }}" class="border border-black">
                @if ($post->images)
                    {{-- display images --}}
                @endif
            </div>
            <div class="flex flex-col">
                <label for="videos">Nagrania:</label>
                <input type="file" name="videos" accept="video/*" multiple id="videos"
                    value="{{ old('videos') }}" class="border border-black">
                @if ($post->videos)
                    {{-- display videos --}}
                @endif
            </div>

            <button class="text-center border border-black bg-white">{{ $post ? 'Zmień' : 'Utwórz' }}</button>
        </form>
    </x-card>
</x-layout>
