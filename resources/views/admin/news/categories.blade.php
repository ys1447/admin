@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold">Categories</h1>
    <h2 class="text-lg font-light"> All categories in the database </h2>



    <div class="flex flex-col bg-white shadow rounded-sm w-full mt-4 p-4 h-screen">
        <div class="mt-4">
            <a href="{{ route('category') }}"
                class="p-2 bg-purple-900 text-white rounded-md hover:bg-purple-700 shadow transition-all ease-in">Create New
                Category</a>
        </div>
        <hr class="w-full mt-5">

        <div class="w-full overflow-hidden rounded-sm shadow-sm mt-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap border">
                    <thead>
                        <tr class="text-left bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 w-1/5 font-semibold">Created at</th>
                            <th class="px-8 py-2 w-1/5 font-semibold">Category</th>
                            <th class="px-8 py-2 w-1/5 font-semibold">Slug</th>
                            <th class="px-2 py-2 w-1/5 font-semibold">Total Articles</th>
                            <th class="px-2 py-2 w-1/5 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-400">
                        @foreach ($categories as $item)
                            <tr class="bg-white text-gray-500">
                                <td class="px-4 py-2 text-xs w-1/5">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('N F Y - H:i') }}</td>
                                <td class="px-8 py-2 text-xs w-1/5">{{ $item->category }}</td>
                                <td class="px-8 py-2 text-xs w-1/5">{{ $item->slug }}</td>
                                <td class="px-2 py-2 text-xs w-1/5 text-center">{{ $item->article->count() }}</td>
                                <td class="px-2 py-2 text-xs flex w-1/5">
                                    <button
                                        class="px-1 py-1 text-xs font-semibold text-green-900 bg-green-200 rounded-md focus:outline-none focus:shadow-outline-green hover:bg-green-300 flex items-center">
                                        <svg width="13px" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 32 32" viewBox="0 0 32 32" id="edit">
                                            <path
                                                d="M26.71002,0.94c-0.59003-0.59003-1.53003-0.59003-2.12,0L13.20001,12.32996c-0.17999,0.17004-0.29999,0.39001-0.38,0.63l-1.85999,6.21002c-0.16003,0.53003-0.01001,1.09998,0.38,1.48999c0.27997,0.29004,0.66998,0.44,1.06,0.44c0.13995,0,0.28998-0.02002,0.42999-0.06l6.20996-1.85999c0.24005-0.08002,0.46002-0.20001,0.63-0.38L31.06,7.40997C31.34003,7.13,31.5,6.75,31.5,6.34998c0-0.39996-0.15997-0.77997-0.44-1.06L26.71002,0.94z">
                                            </path>
                                            <path
                                                d="M30,14.5c-0.82861,0-1.5,0.67188-1.5,1.5v10c0,1.37891-1.12158,2.5-2.5,2.5H6c-1.37842,0-2.5-1.12109-2.5-2.5V6c0-1.37891,1.12158-2.5,2.5-2.5h10c0.82861,0,1.5-0.67188,1.5-1.5S16.82861,0.5,16,0.5H6C2.96729,0.5,0.5,2.96777,0.5,6v20c0,3.03223,2.46729,5.5,5.5,5.5h20c3.03271,0,5.5-2.46777,5.5-5.5V16C31.5,15.17188,30.82861,14.5,30,14.5z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">Edit</span>
                                    </button>
                                    <button
                                        class="px-1 py-1 ml-2 text-xs font-semibold text-red-600 bg-red-200 hover:bg-red-300 rounded-md focus:outline-none focus:shadow-outline-red active:bg-red-200 flex items-center">
                                        <svg width="16px" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M 6.496094 1 C 5.675781 1 5 1.675781 5 2.496094 L 5 3 L 2 3 L 2 4 L 3 4 L 3 12.5 C 3 13.328125 3.671875 14 4.5 14 L 10.5 14 C 11.328125 14 12 13.328125 12 12.5 L 12 4 L 13 4 L 13 3 L 10 3 L 10 2.496094 C 10 1.675781 9.324219 1 8.503906 1 Z M 6.496094 2 L 8.503906 2 C 8.785156 2 9 2.214844 9 2.496094 L 9 3 L 6 3 L 6 2.496094 C 6 2.214844 6.214844 2 6.496094 2 Z M 5 5 L 6 5 L 6 12 L 5 12 Z M 7 5 L 8 5 L 8 12 L 7 12 Z M 9 5 L 10 5 L 10 12 L 9 12 Z">
                                            </path>
                                        </svg>
                                        <span>Delete</span>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
