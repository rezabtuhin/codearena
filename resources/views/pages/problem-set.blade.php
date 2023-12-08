@extends('layout.master')
@section('content')
    @include('components.navbar')
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="Greetings p-4 bg-white border-top mb-5">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-orange-600 dark:text-gray-400 dark:hover:text-white">
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
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Problem Set</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="p-4 bg-white border-top">
            <p class="description text-2xl mb-2 font-bold">Public Problem Set</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-[16px] text-left rtl:text-right">
                    <thead class="text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-1/5">#</th>
                            <th scope="col" class="px-6 py-3 w-3/5">Name</th>
                            <th scope="col" class="px-6 py-3 w-1/5">Solved By</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($problems as $problem)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $problems->firstItem() + $loop->index }}
                            </td>
                            <td class="px-6 py-4 uppercase">
                                <a href="{{ route('problems.show', $problem) }}" class="text-orange-400 hover:underline font-bold">
                                    {{ $problem->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $solvedBy = \App\Models\Submission::where('problem_id', $problem->id)
                                    ->where('verdict', 1)
                                    ->distinct('submitted_by')
                                    ->count();
                                @endphp
                                <div class="flex items-center">
                                    <span>{{ $solvedBy }} </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
