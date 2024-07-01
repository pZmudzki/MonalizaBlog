<x-layout>
    <x-card>
        <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <h1 class="text-center text-2xl">Zaloguj się</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="rounded-md border border-black">
            </div>
            <div>
                <label for="password">Hasło:</label>
                <input type="password" name="password" id="password" class="rounded-md border border-black">
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember" class="rounded-md border border-black">
                <label for="remember">Zapamiętaj</label>
            </div>
            <button type="submit"
                class="bg-gray-200 rounded-md border border-black hover:bg-gray-300 transition">Zaloguj!</button>
        </form>
    </x-card>
</x-layout>
