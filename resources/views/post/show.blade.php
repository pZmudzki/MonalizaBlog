<x-layout>
    <x-post-card :post="$post">
        <div>{{ $post->content }}</div>
        @foreach ($post->files as $file)
            @if ($file->type === 'image')
                <img src="{{ url('/') }}/storage/{{ $file->filepath }}" alt="{{ $file->filename }}">
            @endif
        @endforeach
        <div class="flex flex-col items-center mt-4 gap-2">
            @foreach ($post->files as $file)
                @if ($file->type === 'video')
                    <video controls>
                        <source src="{{ url('/') }}/storage/{{ $file->filepath }}">
                    </video>
                @endif
            @endforeach
        </div>
    </x-post-card>
    <x-card>
        <form action="" method="POST">
            @csrf
            <label for="firstname"></label>
        </form>
    </x-card>
</x-layout>
