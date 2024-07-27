<header id="header" class="header">
    <nav class="navList">
        <a href="{{ route('post.index', ['type' => 'wierszem_pisane']) }}" class="navLink link">
            Wierszem pisane
        </a>

        <a href="{{ route('post.index', ['type' => 'scenariusze_pisane_życiem']) }}" class="navLink link">
            Scenariusze pisane życiem
        </a>
    </nav>
    <a href="/" class="navLink logo">
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

    {{-- burger menu button --}}
    <button class="toggleNavBtn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>

<div class="mobileNav hidden">
    <nav class="mobileNavList">
        <div>
            @foreach ($links as $key => $value)
                {{-- close mobile navbar on click --}}
                <a href="{{ route('post.index', ['type' => $key]) }}" class="navLink link">
                    <div class="linkContainer">
                        <span>{{ $value }}</span>
                        {{-- <FaArrowRight class={navbar.arrowIcon} aria-hidden="true" /> --}}
                    </div>
                </a>
            @endforeach

            <ul class="socials">
                <li>
                    <a href="https://www.facebook.com/monika.zajcherbadzian/" target="_blank">
                        {{-- <FaSquareFacebook class={navbar.socialIcon} aria-hidden="true" /> --}}
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/monalizabezramy/" target="_blank">
                        {{-- <FaSquareInstagram class={navbar.socialIcon} aria-hidden="true" /> --}}
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
