<x-layout>
    <x-card>
        @if ($post)
            <div class="mb-4 flex items-center justify-between">
                @if ($post->archived)
                    <h2>Post zarchiwizowany</h2>
                @endif
                <form class="ml-auto" action="{{ route('post.archive', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="text-center border border-black {{ $post->archived ? 'bg-white' : 'bg-yellow-200' }}">
                        {{ $post->archived ? 'Upublicznij' : 'Zarchiwizuj' }}
                    </button>
                </form>
            </div>
        @endif
        <form action="{{ $post ? route('post.update', $post) : route('post.store') }}" method="POST"
            enctype="multipart/form-data" class="flex flex-col gap-4 mb-4">
            @csrf
            @if ($post)
                @method('PUT')
            @endif
            <div class="flex flex-col">
                <label for="title">Tytuł:</label>
                <input type="text" name="title" id="title" value="{{ $post->title ?? old('title') }}"
                    class="rounded-md border border-black px-2">
            </div>
            <div class="flex flex-col">
                <label for="content">Treść:</label>
                <textarea name="content" id="content" class="rounded-md border border-black px-2" rows="12">{{ $post->content ?? old('content') }}</textarea>
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
                @if ($post)
                    @if ($post->images)
                        {{-- display images --}}
                    @endif
                @endif
            </div>
            <div class="flex flex-col">
                <label for="videos">Nagrania:</label>
                <input type="file" name="videos" accept="video/*" multiple id="videos"
                    value="{{ old('videos') }}" class="border border-black">
                @if ($post)
                    @if ($post->videos)
                        {{-- display videos --}}
                    @endif
                @endif
            </div>

            <button class="text-center border border-black bg-white">{{ $post ? 'Zmień' : 'Utwórz' }}</button>
        </form>
        @if ($post)
            <form action="{{ route('post.destroy', ['post' => $post]) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button class="text-center border border-black bg-red-400 w-full">Usuń post</button>
            </form>
        @endif
    </x-card>
</x-layout>
