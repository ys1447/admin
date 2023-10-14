<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tagify@4"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-scrollbar.css') }}">
</head>

<body class="overflow-y-scroll">
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="lg:w-2/12 bg-slate-700 w-full">
                {{-- Profile --}}
                <div class="p-4 text-white">
                    <div class="flex items-center">
                        <div class="bg-green-600 w-16 h-16 flex items-center justify-center text-xl rounded-full">
                            <span>N</span>
                        </div>
                        <div class="pl-5">
                            <h1 class="font-semibold">Nama</h1>
                            <p class="text-xs">Online</p>
                        </div>
                    </div>
                </div>

                {{-- Menu --}}
                @foreach ($menuItems as $group => $items)
                    <div x-data="{ open: false }" class="relative text-sm">
                        {{-- Title --}}
                        <div class="p-4 bg-slate-800 text-gray-500 font-semibold uppercase flex justify-between items-center cursor-pointer hover:bg-slate-600 hover:text-gray-300"
                            @click="open = !open">
                            {{ $group }}
                            <svg x-bind:style="'transform: rotate(' + (open ? '90deg' : '0deg') + '); transition: transform 0.3s;'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" width="16" height="16">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>

                        {{-- Dropdown --}}
                        <div x-show="open"
                            class="origin-top-right relative right-0 bg-white ring-1 ring-black ring-opacity-5 overflow-y-auto max-h-60">
                            @foreach ($items as $item)
                                <a href="{{ asset($item['url']) }}">
                                    <div class="p-4 bg-slate-700 hover:bg-slate-600 text-gray-300">
                                        <div class="flex">
                                            <img src="{{ $item['icon'] }}" alt=""> Icon
                                            <p class="pl-4">{{ $item['label'] }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Content --}}
            <div class="lg:w-10/12 bg-slate-100 p-4 w-full">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        new Tagify(document.querySelector('.tag-input'), {
            whitelist: [], // You can specify a list of allowed tags here
            enforceWhitelist: true, // Allow only tags from the whitelist
            dropdown: {
                maxItems: 5, // Maximum number of tags that can be added
            },
        });
    </script>
</body>

</html>
