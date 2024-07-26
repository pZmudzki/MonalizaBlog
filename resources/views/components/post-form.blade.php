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
                <x-label for="title" required>Tytuł</x-label>
                <x-text-input name="title" value="{{ $post->title ?? old('title') }}>" />
            </div>
            <div class="flex
                    flex-col">
                <x-label for="content" required>Treść</x-label>
                <x-text-input type="textarea" name="content" value="{{ $post->content ?? old('content') }}" />
            </div>
            <div class="flex flex-col">
                <x-label for="type" required>Typ</x-label>
                <select name="type" id="type" value="{{ $post->type ?? old('type') }}"
                    class="rounded-md border border-black px-2">
                    @foreach (['wierszem_pisane' => 'Wierszem Pisane', 'scenariusze_pisane_życiem' => 'Scenariusze Pisane Życiem', 'z_medycznego_punktu_widzenia' => 'Z Medycznego Punktu Widzenia', 'taniec' => 'Taniec'] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- files --}}

            <div class="flex flex-col">
                <x-label for="images">Zdjęcia</x-label>
                <input type="file" name="images[]" accept="image/*" multiple id="images"
                    value="{{ old('images') }}" class="border border-black">
            </div>
            <div class="flex flex-col">
                <x-label for="videos">Nagrania</x-label>
                <input type="file" name="videos[]" accept="video/*" multiple id="videos"
                    value="{{ old('videos') }}" class="border border-black">
            </div>
            <div class="flex gap-2">
                <div class="flex flex-col grow">
                    <x-label for="video_link">Link do nagrania YouTube</x-label>
                    <x-text-input name="video_link" />
                </div>
                <div class="flex flex-col grow">
                    <x-label for="video_link_title">Tytuł nagrania YouTube</x-label>
                    <x-text-input name="video_link_title" />
                </div>
            </div>

            <div>
                @if ($post)
                    @if ($post->files)
                        {{-- display files --}}
                        <ul class="list-none grid grid-cols-3 gap-2 mt-4">
                            @forelse ($post->files as $file)
                                <li class="relative">
                                    @if ($file->source === 'youtube')
                                        <iframe src="{{ $file->filepath }}" title="{{ $file->filename }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                        </iframe>
                                    @elseif ($file->type === 'image')
                                        <img src="{{ url('/') }}/storage/{{ $file->filepath }}"
                                            alt="{{ $file->filename }}">
                                    @else
                                        <video controls>
                                            <source src="{{ url('/') }}/storage/{{ $file->filepath }}" />
                                        </video>
                                    @endif

                                    <p class="truncate">{{ $file->filename }}</p>

                                    {{-- button to delete file --}}
                                    <div class="absolute top-0 right-0 text-sm font-bold p-1 bg-red-400">
                                        <label for="{{ $file->id }}">Usuń</label>
                                        <input type="checkbox" id="{{ $file->id }}" name="deleteFiles[]"
                                            value="{{ $file->id }}" />
                                    </div>
                                    {{-- button to delete file --}}
                                </li>

                            @empty
                                <li class="text-center py-2">Post nie ma dołączonych plików</li>
                            @endforelse
                        </ul>
                        {{-- display images --}}
                    @endif
                @endif
            </div>

            {{-- files --}}

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
