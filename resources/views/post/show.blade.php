<x-layout>
    <x-post-card :post="$post">
        <div class="grid grid-cols-2">
            <div>{{ $post->content }}</div>
            @foreach ($post->images as $image)
                <img src="{{ url('/') }}/storage/{{ $image->filepath }}" alt="{{ $image->filename }}">
            @endforeach
        </div>
        <div class="flex justify-center mt-4">
            @foreach ($post->videos as $video)
                <video controls>
                    <source src="{{ url('/') }}/storage/{{ $video->filepath }}" type="video/mp4">
                </video>
            @endforeach
        </div>
    </x-post-card>
</x-layout>
