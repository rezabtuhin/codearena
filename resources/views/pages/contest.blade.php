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
                    height: 180px;">
                <div class="w-full h-full overlay flex flex-col items-center justify-center">
                    <h1 class="text-3xl font-black mb-3 text-white">
                        {{ $contest->name }}
                    </h1>
                    @if(isset($isRunning) && $isRunning)
                        <span class="text-white text-[20px] font-light" id="timer-top"></span>
                        <script>
                            var endTime{{ $contest->id }} = '{{ $contest->end_time }}';
                            var countDownDate{{ $contest->id }} = new Date(endTime{{ $contest->id }}).getTime();
                            var x{{ $contest->id }} = setInterval(function() {
                                var now{{ $contest->id }} = new Date().getTime();
                                var distance{{ $contest->id }} = countDownDate{{ $contest->id }} - now{{ $contest->id }};
                                var days{{ $contest->id }} = Math.floor(distance{{ $contest->id }} / (1000 * 60 * 60 * 24));
                                var hours{{ $contest->id }} = Math.floor((distance{{ $contest->id }} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes{{ $contest->id }} = Math.floor((distance{{ $contest->id }} % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds{{ $contest->id }} = Math.floor((distance{{ $contest->id }} % (1000 * 60)) / 1000);
                                var countdownText{{ $contest->id }} = '';
                                if (days{{ $contest->id }} > 0) {
                                    countdownText{{ $contest->id }} += days{{ $contest->id }} + 'd ';
                                }
                                if (hours{{ $contest->id }} > 0) {
                                    countdownText{{ $contest->id }} += hours{{ $contest->id }} + 'h ';
                                }
                                if (minutes{{ $contest->id }} > 0) {
                                    countdownText{{ $contest->id }} += minutes{{ $contest->id }} + 'm ';
                                }
                                if (seconds{{ $contest->id }} >= 0) {
                                    countdownText{{ $contest->id }} += seconds{{ $contest->id }} + 's ';
                                }
                                document.getElementById('timer-top').innerHTML = "Remaining: "+countdownText{{ $contest->id }};
                                if (distance{{ $contest->id }} < 0) {
                                    clearInterval(x{{ $contest->id }});
                                    document.getElementById('timer-top').innerHTML = 'Contest has Ended!';
                                    setInterval(()=>{
                                        window.location.reload();
                                    }, 2000);
                                }
                            }, 0);

                        </script>
                    @endif
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
{{--            <button type="button" disabled="" class="inline-flex items-center justify-center w-auto px-3 py-2 space-x-2 text-sm transition rounded">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 animate-spin" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                    <path fill-rule="evenodd"--}}
{{--                          d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"--}}
{{--                          clip-rule="evenodd" />--}}
{{--                </svg>--}}
{{--                <span class="text-[19px]">We are reloading for you please wait...</span>--}}
{{--            </button>--}}
{{--            <p class="description font-bold mb-2">Point distribution</p>--}}
{{--            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">--}}
{{--                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">--}}
{{--                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">--}}
{{--                    <tr>--}}
{{--                        <th scope="col" class="px-6 py-3">Problem Name</th>--}}
{{--                        <th scope="col" class="px-6 py-3">Before 30 mins</th>--}}
{{--                        <th scope="col" class="px-6 py-3">After 30 mins</th>--}}
{{--                        <th scope="col" class="px-6 py-3">After 60 mins</th>--}}
{{--                        <th scope="col" class="px-6 py-3">After 90 mins</th>--}}
{{--                        <th scope="col" class="px-6 py-3">Unsuccessful hack</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">--}}
{{--                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Problem 1</th>--}}
{{--                        <td class="px-6 py-4">250</td>--}}
{{--                        <td class="px-6 py-4">230</td>--}}
{{--                        <td class="px-6 py-4">200</td>--}}
{{--                        <td class="px-6 py-4">160</td>--}}
{{--                        <td class="px-6 py-4">-50</td>--}}
{{--                    </tr>--}}
{{--                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">--}}
{{--                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Problem 2</th>--}}
{{--                        <td class="px-6 py-4">300</td>--}}
{{--                        <td class="px-6 py-4">280</td>--}}
{{--                        <td class="px-6 py-4">250</td>--}}
{{--                        <td class="px-6 py-4">240</td>--}}
{{--                        <td class="px-6 py-4">-80</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}

        </div>

        <div class="p-4 bg-white border-top">
            @if(!isset($problems))
                @if($contest->end_time < now()->setTimezone('Asia/Dhaka'))
                    <div>
                        <h1 class="text-center text-primary text-[35px] font-bold">Contest has ended</h1>
                        <div class="flex justify-center mt-2">
                            <button class="accent-color text-white p-2 hover:bg-amber-500 transition-all">See standings</button>
                        </div>
                    </div>
                @else
                <p class="timer text-center font-normal text-gray-700 dark:text-gray-400">
                    <span class="text-[19px]">
                        <span id="timer-heading"></span>
                        <br>
                        <span id="countdown-{{ $contest->id }}" class="text-primary text-[35px] font-bold"></span>
                    </span>
                    <script>
                        var startTime{{ $contest->id }} = '{{ $contest->start_time }}';
                        var countDownDate{{ $contest->id }} = new Date(startTime{{ $contest->id }}).getTime();
                        var x{{ $contest->id }} = setInterval(function() {
                            var now{{ $contest->id }} = new Date().getTime();
                            var distance{{ $contest->id }} = countDownDate{{ $contest->id }} - now{{ $contest->id }};

                            var days{{ $contest->id }} = Math.floor(distance{{ $contest->id }} / (1000 * 60 * 60 * 24));
                            var hours{{ $contest->id }} = Math.floor((distance{{ $contest->id }} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes{{ $contest->id }} = Math.floor((distance{{ $contest->id }} % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds{{ $contest->id }} = Math.floor((distance{{ $contest->id }} % (1000 * 60)) / 1000);

                            var countdownText{{ $contest->id }} = '';

                            if (days{{ $contest->id }} > 0) {
                                countdownText{{ $contest->id }} += days{{ $contest->id }} + 'd ';
                            }
                            if (hours{{ $contest->id }} > 0) {
                                countdownText{{ $contest->id }} += hours{{ $contest->id }} + 'h ';
                            }
                            if (minutes{{ $contest->id }} > 0) {
                                countdownText{{ $contest->id }} += minutes{{ $contest->id }} + 'm ';
                            }
                            countdownText{{ $contest->id }} += seconds{{ $contest->id }} + 's ';
                            document.getElementById('timer-heading').innerHTML = "The contest will start after";
                            document.getElementById('countdown-{{ $contest->id }}').innerHTML = countdownText{{ $contest->id }};
                            if (distance{{ $contest->id }} < 0) {
                                clearInterval(x{{ $contest->id }});
                                document.getElementById('timer-heading').innerHTML = '<div type="button" class="inline-flex items-center justify-center w-auto px-3 py-2 space-x-2 text-sm transition rounded"> <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 animate-spin" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" /></svg><span class="text-[19px]">Reloading please wait...</span></div>';
                                document.getElementById('countdown-{{ $contest->id }}').innerHTML = 'Contest has started!';
                                setInterval(() => {
                                    window.location.reload();
                                }, 2000)
                            }
                        }, 1);

                    </script>
                </p>
                @endif
            @elseif($contest->start_time < now()->setTimezone('Asia/Dhaka') || $contest->end_time > now()->setTimezone('Asia/Dhaka'))
                <div>
                    <div class="standings flex justify-end mb-4">
                        <a class="text-primary text-[18px] hover:underline" href={{ route('standings') }}>Standings</a>
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
                            @php $i = 1 @endphp
                            @foreach($problems as $problem)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        @php
                                            echo $i;
                                            $i++;
                                        @endphp
                                    </th>
                                    <td class="px-6 py-4"><a href="{{ route('problems.show', $problem->id) }}" class="text-primary underline">{{ $problem->title }}</a></td>
                                    <td class="px-6 py-4">N/A</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

