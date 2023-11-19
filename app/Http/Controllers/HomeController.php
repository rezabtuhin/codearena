<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $runningContests = Contest::select('*')
            ->selectRaw('(UNIX_TIMESTAMP(end_time) - UNIX_TIMESTAMP(NOW())) as remaining_time')
            ->where('start_time', '<=', now()->setTimezone('Asia/Dhaka'))
            ->where('end_time', '>=', now()->setTimezone('Asia/Dhaka'))
            ->orderBy('remaining_time', 'asc')
            ->get();

        $upcomingContests = Contest::where('start_time', '>', now()->setTimezone('Asia/Dhaka'))
            ->orderBy('start_time', 'asc')
            ->get();
        return view('pages.home', ['runningContests' => $runningContests, 'upcomingContests' => $upcomingContests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
