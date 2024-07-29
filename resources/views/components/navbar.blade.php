<header id="header" class="header bg-cyan-200">
    <nav class="navList">
        <a href="{{ route('post.index', ['type' => 'wierszem_pisane']) }}" class="navLink link">
            Wierszem pisane
        </a>

        <a href="{{ route('post.index', ['type' => 'scenariusze_pisane_życiem']) }}" class="navLink link">
            Scenariusze pisane życiem
        </a>
    </nav>
    <a href="/" class="font-xl navLink logo">
        MonalizaBezRamy
    </a>
    <nav class="navList">
        <a href="{{ route('post.index', ['type' => 'z_medycznego_punktu_widzenia']) }}" class="navLink link">
            Z medycznego punktu widzenia
        </a>

        <a href="{{ route('post.index', ['type' => 'taniec']) }}" class="navLink link">
            Taniec
        </a>
    </nav>

    @if (auth()->user())
        <div class="flex gap-4 navList">
            <a href="{{ route('post.create') }}" class="bg-gray-200 p-2">Utwórz post</a>
            <form action="{{ route('auth.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-300 p-2">Wyloguj</button>
            </form>
        </div>
    @endif

    {{-- burger menu button --}}
    <button class="toggleNavBtn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>

<div class="mobileNav hidden">
    <nav class="mobileNavList">
        <div class="flex flex-col gap-4 w-full">
            @foreach ($links as $key => $value)
                {{-- close mobile navbar on click --}}
                <a href="{{ route('post.index', ['type' => $key]) }}" class="navLink link ">
                    <div
                        class="linkContainer {{ request()->query('type') === $key ? 'border-b border-cyan-500' : '' }}">
                        <span>{{ $value }}</span>
                        <svg class="fill-cyan-500 arrowIcon socialIcon {{ request()->query('type') === $key ? '-rotate-45' : '' }}"
                            viewBox="0 0 24 24">
                            <path
                                d="M15.71,12.71a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-3-3a1,1,0,0,0-1.42,1.42L12.59,11H9a1,1,0,0,0,0,2h3.59l-1.3,1.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0ZM22,12A10,10,0,1,0,12,22,10,10,0,0,0,22,12ZM4,12a8,8,0,1,1,8,8A8,8,0,0,1,4,12Z" />
                        </svg>
                    </div>
                </a>
            @endforeach

            @if (auth()->user())
                <div class="flex gap-4">
                    <a href="{{ route('post.create') }}" class="grow text-center bg-gray-200 p-2">Utwórz post</a>
                    <form action="{{ route('auth.destroy') }}" method="POST" class="grow">
                        @csrf
                        @method('DELETE')
                        <button class="w-full text-center bg-red-300 p-2">Wyloguj</button>
                    </form>
                </div>
            @endif

            <ul class="flex gap-4 items-center">
                <li>
                    <a href="https://www.facebook.com/monika.zajcherbadzian/" target="_blank">
                        <svg class="socialIcon fill-gray-400" viewBox="0 0 512 512">
                            <path
                                d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/monalizabezramy/" target="_blank">
                        <svg class="socialIcon fill-gray-400" version="1.1" viewBox="0 0 512 512">
                            <path
                                d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-288.985,423.278l0,-225.717l-75.04,0l0,225.717l75.04,0Zm270.539,0l0,-129.439c0,-69.333 -37.018,-101.586 -86.381,-101.586c-39.804,0 -57.634,21.891 -67.617,37.266l0,-31.958l-75.021,0c0.995,21.181 0,225.717 0,225.717l75.02,0l0,-126.056c0,-6.748 0.486,-13.492 2.474,-18.315c5.414,-13.475 17.767,-27.434 38.494,-27.434c27.135,0 38.007,20.707 38.007,51.037l0,120.768l75.024,0Zm-307.552,-334.556c-25.674,0 -42.448,16.879 -42.448,39.002c0,21.658 16.264,39.002 41.455,39.002l0.484,0c26.165,0 42.452,-17.344 42.452,-39.002c-0.485,-22.092 -16.241,-38.954 -41.943,-39.002Z" />
                        </svg>
                    </a>
                </li>
                <li class="text-gray-400 text-md font-bold w-full text-end">
                    <a href="mailto: jakismail@gmail.com">
                        jakismail@gmail.com
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
