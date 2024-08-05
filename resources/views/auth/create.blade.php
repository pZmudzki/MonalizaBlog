<x-layout>
    <x-card>
        <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <h1 class="text-center text-2xl">Zaloguj się</h1>
            <div>
                <x-label for="email">Email:</x-label>
                <x-text-input name="email" placeholder="Email" />
            </div>
            <div>
                <x-label for="password">Hasło:</x-label>
                <x-text-input type="password" name="password" placeholder="Hasło" />
            </div>
            <div class="flex gap-2">
                <x-label for="remember">Zapamiętaj</x-label>
                <input type="checkbox" name="remember" id="remember" class="mb-2 rounded-md border border-black">
            </div>
            <button type="submit"
                class="bg-gray-200 rounded-md border border-black hover:bg-gray-300 transition">Zaloguj!</button>
        </form>
    </x-card>
</x-layout>
