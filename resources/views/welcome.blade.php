<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rubick Bot - AI Writing Assistant by Al-Fhaigar Usman</title>
        <link rel = "icon" href ="{{ asset('storage/images/chat-gpt-logo.jpg') }}" type = "image/x-icon">

        <!-- PWA  -->
        <meta name="theme-color" content="#4a5568" />
        <link rel="apple-touch-icon" href="{{ asset('storage/images/chat-gpt-logo.jpg') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                font-family: 'Space Grotesk', sans-serif;
            }
            .title:empty:before {
                content:attr(data-placeholder);
                color:gray
            }
        </style>
        <script src="https://unpkg.com/marked" defer></script>
    </head>
    <body class="antialiased">
        <div class="relative container-fluid flex items-top justify-center min-h-screen bg-gray-100 px-3 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8 space-y-4 py-4">
                <div class="text-center text-gray-800 dark:text-gray-300 py-4">
                    <h1 class="xl:text-7xl sm:text-5xl text-4xl font-bold">Rubick Bot</h1>
                </div>
                <div class="w-full rounded-md bg-white border-2 border-gray-600 p-4 min-h-[20px]  text-gray-600">
                    <form action="{{ url('/chat/generate') }}" method="post" class="inline-flex gap-2 w-full">
                        @csrf
                        @if ( !empty($title))
                            <input required name="title" class="w-full  outline-none text-2xl font-bold" placeholder="{{ $title }}"/>
                        @else
                            <input required name="title" class="w-full  outline-none text-2xl font-bold" placeholder="What's on your mind?" />
                        @endif
                        <button class="rounded-md bg-emerald-500 px-4 py-2 text-white font-semibold">Generate</button>
                    </form>
                </div>
                @if ( !empty($content))
                <div class="w-full rounded-md bg-white border-2 border-gray-600 p-4 min-h-[500px] text-gray-600">
                    <textarea class="min-h-[500px] h-full w-full outline-none" spellcheck="false" placeholder="Results are in here..." readonly>{{ $content }}</textarea>
                </div>
                @endif

                {{-- <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8 " /> --}}
                <span class="block text-sm text-gray-500 sm:text-center text-center dark:text-gray-400">© 2022 Coded with a
                    <lord-icon
                    src="https://cdn.lordicon.com/rjzlnunf.json"
                    trigger="loop"
                    colors="primary:#ffffff,secondary:#ffffff"
                    stroke="90"
                    style="width:25px;height:25px">
                </lord-icon> by <a href="https://github.com/rubickking04" class="hover:underline">{{ __('Al-Fhaigar Usman') }}</a>. 🤪
                </span>
            </div>
        </div>
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if (!navigator.serviceWorker.controller) {
                navigator.serviceWorker.register("/sw.js").then(function (reg) {
                    console.log("Service worker has been registered for scope: " + reg.scope);
                });
            }
        </script>
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    </body>
</html>

