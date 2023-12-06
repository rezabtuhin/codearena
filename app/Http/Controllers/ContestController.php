<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Problem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        try {
            $contest = Contest::find($id);
            $current_time = now()->setTimezone('Asia/Dhaka');
            if ($contest) {
                if ($contest->start_time <= $current_time && $contest->end_time > $current_time) {
                    $problems = Problem::where('contest_id', $id)->get();
                    return view('pages.contest', ["contest" => $contest, "problems" => $problems, "isRunning" => true]);
                } else {
                    return view('pages.contest', ["contest" => $contest]);
                }
            } else {
                return response()->json(['error' => 'Contest not found'], 404);
            }
        }catch (\Exception $e){
            return "1";
        }
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
