<x-main-layout>

    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            <nav class="flex items-center justify-end gap-4">
                <a href="{{ route('review.create') }}" class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                    Create Review
                </a>
                <a href="{{ route('logout') }}" class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal">
                    Log out
                </a>
            </nav>
        </header>

        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="max-w-[335px] w-full lg:max-w-4xl space-y-5">

                @foreach ($reviews as $review)
                    <div class="text-[13px] leading-[20px] p-6 pb-12 lg:p-10 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] rounded-lg">
                        <div class="flex justify-between items-baseline">
                            <div class="flex items-center space-x-2">
                                <h2 class="text-xl font-semibold"><span
                                        class="@if ($review->rating <= 4) text-red-600
                            @elseif ($review->rating > 4 && $review->rating <= 8) text-amber-600
                            @elseif ($review->rating > 8) text-lime-700 @endif">{{ $review->title }}</span>
                                    by <span class="italic underline">{{ $review->author->name }}</span></h2>
                                <span>
                                    @if ($review->again)
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-lime-800 fill-current"
                                                d="M273 151.1L288 171.8L303 151.1C328 116.5 368.2 96 410.9 96C484.4 96 544 155.6 544 229.1L544 231.7C544 249.3 540.6 267.3 534.5 285.4C512.7 276.8 488.9 272 464 272C358 272 272 358 272 464C272 492.5 278.2 519.6 289.4 544C288.9 544 288.5 544 288 544C272.5 544 257.2 539.4 244.9 529.9C171.9 474.2 32 343.9 32 231.7L32 229.1C32 155.6 91.6 96 165.1 96C207.8 96 248 116.5 273 151.1zM320 464C320 384.5 384.5 320 464 320C543.5 320 608 384.5 608 464C608 543.5 543.5 608 464 608C384.5 608 320 543.5 320 464zM521.4 403.1C514.3 397.9 504.2 399.5 499 406.6L446 479.5L419.2 452.7C413 446.5 402.8 446.5 396.6 452.7C390.4 458.9 390.4 469.1 396.6 475.3L436.6 515.3C439.9 518.6 444.5 520.3 449.2 519.9C453.9 519.5 458.1 517.1 460.9 513.4L524.9 425.4C530.1 418.3 528.5 408.2 521.4 403.1z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-red-800 fill-current"
                                                d="M273 151.1L288 171.8L303 151.1C328 116.5 368.2 96 410.9 96C484.4 96 544 155.6 544 229.1L544 231.7C544 249.3 540.6 267.3 534.5 285.4C512.7 276.8 488.9 272 464 272C358 272 272 358 272 464C272 492.5 278.2 519.6 289.4 544C288.9 544 288.5 544 288 544C272.5 544 257.2 539.4 244.9 529.9C171.9 474.2 32 343.9 32 231.7L32 229.1C32 155.6 91.6 96 165.1 96C207.8 96 248 116.5 273 151.1zM464 320C543.5 320 608 384.5 608 464C608 543.5 543.5 608 464 608C384.5 608 320 543.5 320 464C320 384.5 384.5 320 464 320zM523.3 427.3C529.5 421.1 529.5 410.9 523.3 404.7C517.1 398.5 506.9 398.5 500.7 404.7L464 441.4L427.3 404.7C421.1 398.5 410.9 398.5 404.7 404.7C398.5 410.9 398.5 421.1 404.7 427.3L441.4 464L404.7 500.7C398.5 506.9 398.5 517.1 404.7 523.3C410.9 529.5 421.1 529.5 427.3 523.3L464 486.6L500.7 523.3C506.9 529.5 517.1 529.5 523.3 523.3C529.5 517.1 529.5 506.9 523.3 500.7L486.6 464L523.3 427.3z" />
                                        </svg>
                                    @endif
                                </span>

                                {{-- <span>
                                    @if ($review->recommend)
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-lime-800 fill-current"
                                                d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608C575.5 608 640 543.5 640 464zM553.4 403.1C560.5 408.3 562.1 418.3 556.9 425.4L492.9 513.4C490.1 517.2 485.9 519.6 481.2 519.9C476.5 520.2 471.9 518.6 468.6 515.3L428.6 475.3C422.4 469.1 422.4 458.9 428.6 452.7C434.8 446.5 445 446.5 451.2 452.7L478 479.5L531 406.6C536.2 399.5 546.2 397.9 553.4 403.1z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-red-800 fill-current"
                                                d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM496 608C575.5 608 640 543.5 640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608zM518.6 464L555.3 500.7C561.5 506.9 561.5 517.1 555.3 523.3C549.1 529.5 538.9 529.5 532.7 523.3L496 486.6L459.3 523.3C453.1 529.5 442.9 529.5 436.7 523.3C430.5 517.1 430.5 506.9 436.7 500.7L473.4 464L436.7 427.3C430.5 421.1 430.5 410.9 436.7 404.7C442.9 398.5 453.1 398.5 459.3 404.7L496 441.4L532.7 404.7C538.9 398.5 549.1 398.5 555.3 404.7C561.5 410.9 561.5 421.1 555.3 427.3L518.6 464z" />
                                        </svg>
                                    @endif
                                </span> --}}
                            </div>
                            <span class="text-gray-400 italic">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                        </div>
                        <h3 class="text-ldg text-gray-500 italic">{{ $review->movie }} ({{ $review->year }})</h3>
                        <p class="my-4 first-letter:text-2xl first-letter:uppercase whitespace-pre-wrap">{{ $review->body }}</p>

                        <div class="flex justify-between items-end">
                            <div class="space-y-3">

                                <div class="flex space-x-2">
                                    @if ($review->again)
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-lime-800 fill-current"
                                                d="M273 151.1L288 171.8L303 151.1C328 116.5 368.2 96 410.9 96C484.4 96 544 155.6 544 229.1L544 231.7C544 249.3 540.6 267.3 534.5 285.4C512.7 276.8 488.9 272 464 272C358 272 272 358 272 464C272 492.5 278.2 519.6 289.4 544C288.9 544 288.5 544 288 544C272.5 544 257.2 539.4 244.9 529.9C171.9 474.2 32 343.9 32 231.7L32 229.1C32 155.6 91.6 96 165.1 96C207.8 96 248 116.5 273 151.1zM320 464C320 384.5 384.5 320 464 320C543.5 320 608 384.5 608 464C608 543.5 543.5 608 464 608C384.5 608 320 543.5 320 464zM521.4 403.1C514.3 397.9 504.2 399.5 499 406.6L446 479.5L419.2 452.7C413 446.5 402.8 446.5 396.6 452.7C390.4 458.9 390.4 469.1 396.6 475.3L436.6 515.3C439.9 518.6 444.5 520.3 449.2 519.9C453.9 519.5 458.1 517.1 460.9 513.4L524.9 425.4C530.1 418.3 528.5 408.2 521.4 403.1z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-red-800 fill-current"
                                                d="M273 151.1L288 171.8L303 151.1C328 116.5 368.2 96 410.9 96C484.4 96 544 155.6 544 229.1L544 231.7C544 249.3 540.6 267.3 534.5 285.4C512.7 276.8 488.9 272 464 272C358 272 272 358 272 464C272 492.5 278.2 519.6 289.4 544C288.9 544 288.5 544 288 544C272.5 544 257.2 539.4 244.9 529.9C171.9 474.2 32 343.9 32 231.7L32 229.1C32 155.6 91.6 96 165.1 96C207.8 96 248 116.5 273 151.1zM464 320C543.5 320 608 384.5 608 464C608 543.5 543.5 608 464 608C384.5 608 320 543.5 320 464C320 384.5 384.5 320 464 320zM523.3 427.3C529.5 421.1 529.5 410.9 523.3 404.7C517.1 398.5 506.9 398.5 500.7 404.7L464 441.4L427.3 404.7C421.1 398.5 410.9 398.5 404.7 404.7C398.5 410.9 398.5 421.1 404.7 427.3L441.4 464L404.7 500.7C398.5 506.9 398.5 517.1 404.7 523.3C410.9 529.5 421.1 529.5 427.3 523.3L464 486.6L500.7 523.3C506.9 529.5 517.1 529.5 523.3 523.3C529.5 517.1 529.5 506.9 523.3 500.7L486.6 464L523.3 427.3z" />
                                        </svg>
                                    @endif
                                    <p class="font-bold italic @if ($review->again) text-lime-800 @else text-red-800 @endif">Would @if (!$review->again)
                                            not
                                        @endif watch again
                                    </p>
                                </div>

                                {{-- <div class="flex space-x-2">
                                    @if ($review->recommend)
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-lime-800 fill-current"
                                                d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608C575.5 608 640 543.5 640 464zM553.4 403.1C560.5 408.3 562.1 418.3 556.9 425.4L492.9 513.4C490.1 517.2 485.9 519.6 481.2 519.9C476.5 520.2 471.9 518.6 468.6 515.3L428.6 475.3C422.4 469.1 422.4 458.9 428.6 452.7C434.8 446.5 445 446.5 451.2 452.7L478 479.5L531 406.6C536.2 399.5 546.2 397.9 553.4 403.1z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path class="text-red-800 fill-current"
                                                d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM496 608C575.5 608 640 543.5 640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608zM518.6 464L555.3 500.7C561.5 506.9 561.5 517.1 555.3 523.3C549.1 529.5 538.9 529.5 532.7 523.3L496 486.6L459.3 523.3C453.1 529.5 442.9 529.5 436.7 523.3C430.5 517.1 430.5 506.9 436.7 500.7L473.4 464L436.7 427.3C430.5 421.1 430.5 410.9 436.7 404.7C442.9 398.5 453.1 398.5 459.3 404.7L496 441.4L532.7 404.7C538.9 398.5 549.1 398.5 555.3 404.7C561.5 410.9 561.5 421.1 555.3 427.3L518.6 464z" />
                                        </svg>
                                    @endif

                                    <p class="font-bold italic @if ($review->recommend) text-lime-800 @else text-red-800 @endif">Would @if (!$review->recommend)
                                            not
                                        @endif recommend
                                    </p>
                                </div> --}}


                                <p
                                    class="text-2xl font-bold italic
                            @if ($review->rating <= 4) text-red-600
                            @elseif ($review->rating > 4 && $review->rating <= 8) text-amber-600
                            @elseif ($review->rating > 8) text-lime-700 @endif">
                                    Rating: {{ $review->rating }}/10</p>

                            </div>
                            @if (auth()->user()->id === $review->author->id)
                                <a href="{{ route('review.edit', $review->slug) }}"
                                    class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                                    Edit Review</a>
                            @endif
                        </div>

                    </div>
                @endforeach

            </main>
        </div>
    </body>

</x-main-layout>
