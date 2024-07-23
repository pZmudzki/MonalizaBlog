<x-card>
    <h1 class="font-bold mb-4">Dodaj komentarz</h1>
    {{-- {{ dd($post) }} --}}
    <form action="{{ route('comment.store', ['post' => $post->id]) }}" method="POST">
        @csrf
        <div class="flex gap-2 mb-2">
            <div>
                <x-label for="firstname" required>Imię</x-label>
                <x-text-input name="firstname" value="{{ old('firstname') }}" placeholder="Jan" />
            </div>
            <div>
                <x-label for="lastname" required>Nazwisko</x-label>
                <x-text-input name="lastname" value="{{ old('lastname') }}" placeholder="Kowalski" />
            </div>
            <div class="grow">
                <x-label for="email" required>Email</x-label>
                <x-text-input name="email" value="{{ old('email') }}" placeholder="jan.kowalski@gmail.com" />
            </div>
        </div>
        <div class="mb-2">
            <x-label for="content" required>Treść</x-label>
            <x-text-input type="textarea" rows="3" name="content" value="{{ old('content') }}" />
        </div>
        <button class="text-center w-full p-2 bg-gray-500">Wyślij</button>
    </form>
</x-card>
