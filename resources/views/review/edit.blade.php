<x-main-layout>

    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <div class="flex min-h-full flex-col justify-center px-6 py-1 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:min-w-sm">
                <h2 class="text-center text-2xl/9 font-bold tracking-tight text-gray-900 sm:mx-auto sm:w-full sm:max-w-sm">Edit Review</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="{{ route('review.update', $review) }}" method="POST" class="space-y-6">
                    @csrf @method('PATCH')
                    <div>
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title of the post</label>
                        <div class="mt-2">
                            <input id="title" type="text" name="title" required autocomplete="title" value="{{ $review->title }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-700 sm:text-sm/6" />
                        </div>
                    </div>

                    <div class="flex flex-row space-x-3">
                        <div class="flex-2">
                            <label for="movie" class="block text-sm/6 font-medium text-gray-900">Name of the movie</label>
                            <div class="mt-2">
                                <input id="movie" type="text" name="movie" required autocomplete="movie" value="{{ $review->movie }}" disabled
                                    class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-500 cursor-not-allowed outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-700 sm:text-sm/6" />
                            </div>
                        </div>

                        <div class="flex-1">
                            <label for="year" class="block text-sm/6 font-medium text-gray-900">Year</label>
                            <div class="mt-2">
                                <input id="year" type="number" name="year" required autocomplete="year" value="{{ $review->year }}" disabled
                                    class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-500 cursor-not-allowed outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-700 sm:text-sm/6" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Review</label>
                        <div class="mt-2">
                            <textarea id="body" type="text" name="body" required autocomplete="body" rows="4"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-700 sm:text-sm/6">{{ $review->body }}
                        </textarea>
                        </div>
                    </div>

                    <div class="flex items-center mb-4">
                        <input type="hidden" name="again" value="0">
                        <input name="again" id="again" type="checkbox" value="1" class="w-4 h-4 text-rose-700 bg-gray-100 border-gray-300 rounded-sm focus:ring-rose-600 focus:ring-2"
                            @if ($review->again) checked @endif>
                        <label for="again" class="ms-2 text-sm font-medium text-gray-900">Would watch again</label>
                    </div>

                    {{-- <div class="flex items-center mb-4">
                        <input type="hidden" name="recommend" value="0">
                        <input name="recommend" id="recommend" type="checkbox" value="1" class="w-4 h-4 text-rose-700 bg-gray-100 border-gray-300 rounded-sm focus:ring-rose-600 focus:ring-2"
                            @if ($review->recommend) checked @endif>
                        <label for="recommend" class="ms-2 text-sm font-medium text-gray-900">Would recommend to others</label>
                    </div> --}}

                    <div class="mt-8 mb-15">
                        <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
                        <input name="rating" type="range" class="w-full" min="1" max="10" step="0.5" value="{{ $review->rating }}" class="bg-rose-600" />
                        <ul class="flex justify-between w-full px-[5px]">
                            <li class="flex justify-center relative"><span class="absolute">1</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">2</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">3</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">4</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">5</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">6</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">7</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">8</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">9</span></li>
                            <li class="flex justify-center relative"><span class="absolute text-gray-300">&#10073</span></li>
                            <li class="flex justify-center relative"><span class="absolute">10</span></li>
                        </ul>
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
                            class="cursor-pointer flex w-full justify-center rounded-md bg-rose-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-rose-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-700">Update
                            review</button>
                    </div>
                </form>
            </div>
        </div>

        <form action="{{ route('review.delete', $review) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit"
                class="absolute top-5 right-5 cursor-pointer flex justify-center rounded-md bg-gray-400 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-500">Delete
                review</button>
        </form>
    </body>
</x-main-layout>
