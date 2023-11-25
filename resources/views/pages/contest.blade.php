@extends('layout.master')
@section('content')
    @include('components.navbar')
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="Greetings p-4 bg-white border-top mb-5">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Test contest test</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="p-4 bg-white border-top mb-5">
            <div style="
                    background-image: url('{{ asset('storage/contest-banner/'.$contest->banner) }}');
                    background-size: cover;
                    background-position: center;
                    height: 150px;">
                <div class="w-full h-full overlay flex items-center justify-center">
                    <h1 class="text-3xl font-black mb-3 text-white">
                        {{ $contest->name }}
                    </h1>
                </div>

            </div>
            <p class="description mb-3">
                <span class="font-bold">Description: </span>
                {!! $contest->description !!}
            </p>
            <p class="description mb-3">
                <span class="font-bold">Rules: </span>
                {!! $contest->rule !!}
            </p>
            <p class="description font-bold mb-2">Point distribution</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">Problem Name</th>
                        <th scope="col" class="px-6 py-3">Before 30 mins</th>
                        <th scope="col" class="px-6 py-3">After 30 mins</th>
                        <th scope="col" class="px-6 py-3">After 60 mins</th>
                        <th scope="col" class="px-6 py-3">After 90 mins</th>
                        <th scope="col" class="px-6 py-3">Unsuccessful hack</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Problem 1</th>
                        <td class="px-6 py-4">250</td>
                        <td class="px-6 py-4">230</td>
                        <td class="px-6 py-4">200</td>
                        <td class="px-6 py-4">160</td>
                        <td class="px-6 py-4">-50</td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Problem 2</th>
                        <td class="px-6 py-4">300</td>
                        <td class="px-6 py-4">280</td>
                        <td class="px-6 py-4">250</td>
                        <td class="px-6 py-4">240</td>
                        <td class="px-6 py-4">-80</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="p-4 bg-white border-top">
            <div class="standings flex justify-end mb-4"><a class="text-primary text-[18px] hover:underline" href={{ route('standings') }}>Standings</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3 ">Problem Name</th>
                        <th scope="col" class="px-6 py-3">Solved By</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">1</th>
                        <td class="px-6 py-4"><a href="/problem" class="text-primary underline">Problem 1</a></td>
                        <td class="px-6 py-4">14400</td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">2</th>
                        <td class="px-6 py-4"><a href="" class="text-primary underline">Problem 2</a></td>
                        <td class="px-6 py-4">10000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

