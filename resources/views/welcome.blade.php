<x-main-layout>

    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-xl lg:flex-row">
                <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] rounded-lg">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3910 640" class="h-10 mb-5">
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="rgba(255, 0, 0, 1)" />
                                <stop offset="50%" stop-color="rgba(255, 242, 0, 1)" />
                                <stop offset="100%" stop-color="rgba(0, 187, 255, 1)" />
                            </linearGradient>
                        </defs>

                        <!-- Outer rounded rectangle outline -->
                        <rect x="64" y="128" width="512" height="384" rx="64" ry="64" fill="black" stroke="black" stroke-width="60" />

                        <!-- Gradient fill (original shape) -->
                        <path fill="url(#gradient)"
                            d="M512 128C514 128 515.9 128.1 517.8 128.3L422.1 224L490 224L562 152C570.8 163 576 176.9 576 192L576 448C576 483.3 547.3 512 512 512L128 512C92.7 512 64 483.3 64 448L64 192C64 156.7 92.7 128 128 128L198.1 128L102.1 224L170 224L265 129L266 128L358.1 128L262.1 224L330 224L425 129L426 128L512.1 128z" />

                        <!-- Each letter rendered separately with outline -->
                        <g font-family="Arial Black, Helvetica, sans-serif" font-size="520" font-weight="900" fill="black" stroke="white" stroke-width="20" stroke-linejoin="round"
                            paint-order="stroke fill">
                            <text x="640" y="505">M</text>
                            <text x="1070" y="505">o</text>
                            <text x="1320" y="505">v</text>
                            <text x="1580" y="505">i</text>
                            <text x="1690" y="505">e</text>
                            <text x="1980" y="505">R</text>
                            <text x="2300" y="505">e</text>
                            <text x="2580" y="505">v</text>
                            <text x="2840" y="505">i</text>
                            <text x="2950" y="505">e</text>
                            <text x="3200" y="505">w</text>
                            <text x="3600" y="505">s</text>
                        </g>
                    </svg>

                    <h1 class="mb-1 font-medium">Let's get started</h1>
                    <p class="mb-2 text-[#706f6c]">Database of movie reviews by cinema enjoyers from all over the world. Join now.</p>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>

</x-main-layout>
