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
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Standings</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <pre>
        </pre>
        <div class="p-4 bg-white border-top">
            <p class="description text-2xl mb-2"><span class=" font-bold">{{ $contest->name }}</span><br>Standings</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-[16px] text-left rtl:text-right">
                    <thead class="text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-10">#</th>
                        <th scope="col" class="px-6 py-3">Who</th>
                        <th scope="col" class="px-6 py-3">Solved</th>
                        <th scope="col" class="px-6 py-3">Penalty</th>
                        @php $i = 1; @endphp
                        @foreach($problems as $problem)
                            <th scope="col" class="px-6 py-3">
                                <a href="{{ route('problems.show', $problem) }}" class="text-orange-400 hover:underline">
                                    Problem {{ $i }}
                                </a>
                            </th>
                            @php $i++; @endphp
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($submissions as $submission)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $i }}</th>
                            <td class="px-6 py-4 uppercase">{{ \App\Models\User::find($submission['user'])->name }}</td>
                            <td class="px-6 py-4">{{ $submission['totalSolved'] }}</td>
                            <td class="px-6 py-4">{{ $submission['penalty'] }}</td>
                            @foreach($problems as $problem)
                                @foreach($submission['solved'] as $solved)
                                    @if($problem == $solved['problem'])
                                        <td class="px-6 py-4">
                                            <div>
                                                <p>
                                                    <span class="text-green-600 font-bold">
                                                        +{{ $solved['wrong'] > 0 ? $solved['wrong'] : "" }}
                                                    </span>
                                                    <span class="text-green-600">
                                                        <br>
                                                        @php
                                                            $timestamp1 = \Carbon\Carbon::parse($contest->start_time);
                                                            $timestamp2 = \Carbon\Carbon::parse($solved['submitted_at']);
                                                            $difference = $timestamp1->diff($timestamp2);
                                                            $hourDifference = $difference->format('%h');
                                                            $minuteDifference = $difference->format('%I');
                                                        @endphp
                                                        {{ $hourDifference }}:{{ $minuteDifference }}
                                                    </span>
                                                </p>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4">
                                            -
                                        </td>
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                        @php $i++; @endphp

                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
