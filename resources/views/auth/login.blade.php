<x-main-layout>

    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3910 640" class="mx-auto h-10 w-auto">
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
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf @method('POST')
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" required autocomplete="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-700 sm:text-sm/6" />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-rose-700 hover:text-rose-600">Forgot password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-700 sm:text-sm/6" />
                        </div>
                    </div>

                    @if ($errors)
                        <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div>
                        <button type="submit"
                            class="cursor-pointer flex w-full justify-center rounded-md bg-rose-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-rose-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-700">Sign
                            in</button>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('register') }}" class="font-semibold text-rose-700 hover:text-rose-600">Don't have an account?</a>
                    </div>
                </form>
            </div>
        </div>


    </body>
</x-main-layout>
