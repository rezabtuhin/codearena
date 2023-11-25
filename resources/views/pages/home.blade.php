@extends('layout.master')
@section('content')
    @include('components.navbar')
    <div class="max-w-screen-xl mx-auto p-4">
        @auth
        <div class="Greetings p-6 bg-white border-top mb-5">
            <h5 class="text-2xl">Welcome,
                    <span class="font-black">
                        {{ explode(' ', auth()->user()->name)[0] }}
                    </span>
                    {{ implode(' ', array_slice(explode(' ', auth()->user()->name), 1)) }}
                </h5>
            </div>
        @endauth
        <div class="p-6 bg-white border-top mb-3 grid md:grid-cols-2 sm:grid-cols-2 gap-4">
            <h1 class="text-2xl font-bold col-span-2">Running Contests</h1>
            @if ($runningContests->isEmpty())
                <p class="text-center text-primary text-[20px] font-bold col-span-2">No running contests at the moment.</p>
            @else
                @foreach($runningContests as $contest)
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('contest.show', $contest->id) }}" class="banner-img">
                            <img class="rounded-t-lg" src={{ asset('storage/contest-banner/'.$contest->banner) }} />
                        </a>
                        <div class="p-5">
                            <a href="{{ route('contest.show', $contest->id) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $contest->name }}</h5>
                            </a>
                            <p class="timer font-normal text-gray-700 dark:text-gray-400">
                                <span class="text-[19px]">Time remaining: <span id="countdown-{{ $contest->id }}" class="text-primary font-bold"></span></span>

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
                                        if (seconds{{ $contest->id }} > 0) {
                                            countdownText{{ $contest->id }} += seconds{{ $contest->id }} + 's ';
                                        }
                                        document.getElementById('countdown-{{ $contest->id }}').innerHTML = countdownText{{ $contest->id }};
                                        if (distance{{ $contest->id }} < 0) {
                                            clearInterval(x{{ $contest->id }});
                                            document.getElementById('countdown-{{ $contest->id }}').innerHTML = 'Contest has Ended!';
                                        }
                                    }, 1000);

                                </script>
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="p-6 bg-white border-top mb-3 grid md:grid-cols-2 sm:grid-cols-2 gap-4">
            <h1 class="text-2xl font-bold col-span-2">Upcoming Contests</h1>
            @if($upcomingContests->isEmpty())
                <p class="text-center text-primary text-[20px] font-bold col-span-2">No upcoming contests at the moment.</p>
            @endif
            @foreach($upcomingContests as $contest)
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('contest.show', $contest->id) }}" class="banner-img">
                        <img class="rounded-t-lg" src={{ asset('storage/contest-banner/'.$contest->banner) }} />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('contest.show', $contest->id) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $contest->name }}</h5>
                        </a>
                        <p class="timer font-normal text-gray-700 dark:text-gray-400">
                            <span class="text-[19px]">Before contest: <span id="countdown-{{ $contest->id }}" class="text-primary font-bold"></span></span>
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
                                    document.getElementById('countdown-{{ $contest->id }}').innerHTML = countdownText{{ $contest->id }};
                                    if (distance{{ $contest->id }} < 0) {
                                        clearInterval(x{{ $contest->id }});
                                        document.getElementById('countdown-{{ $contest->id }}').innerHTML = 'Contest has started!';
                                    }
                                }, 1000);

                            </script>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
