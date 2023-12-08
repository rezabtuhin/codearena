<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Problem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class CreateProblem extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $contestsNotStarted = Contest::where('created_by', $user->id)->where('start_time', '>', now()->setTimezone('Asia/Dhaka'))->get();
        return view('admin.contestview', compact('contestsNotStarted'));
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
//        dd($request->all());
        try {
            $request->validate([
                "contest" => 'required',
                'title' => 'required|max:300',
                'description' => 'required',
                'hint' => 'nullable',
                'sample_input' => 'required|file|mimes:txt,text/plain|max:10240',
                'sample_output' => 'required|file|mimes:txt,text/plain|max:10240',
                'full_input' => 'required|file|mimes:txt,text/plain|max:10240',
                'full_output' => 'required|file|mimes:txt,text/plain|max:10240',
                "memory" => "required",
                "time" => "required",
                'visibility_after_contest' => 'nullable'
            ]);
            $folder_name = Auth::user()->id."_".time().strtolower(str_replace([' ', '.'], '', $request->title));
            $request->sample_input->storeAs('public/problems/'.$folder_name, 'sample_input.'.$request->file('sample_input')->getClientOriginalExtension());
            $request->sample_output->storeAs('public/problems/'.$folder_name, 'sample_output.'.$request->file('sample_output')->getClientOriginalExtension());
            $request->full_input->storeAs('public/problems/'.$folder_name, 'full_input.'.$request->file('full_input')->getClientOriginalExtension());
            $request->full_output->storeAs('public/problems/'.$folder_name, 'full_output.'.$request->file('full_output')->getClientOriginalExtension());
            Problem::create([
                "contest_id" => $request->contest,
                "title" => $request->title,
                "description" => $request->description,
                "hints" => (isset($request->hint)) ? $request->hint : null,
                "sample_input" => $folder_name."/sample_input.txt",
                "sample_output" => $folder_name."/sample_output.txt",
                "actual_input" => $folder_name."/full_input.txt",
                "actual_output" => $folder_name."/full_output.txt",
                "memory_limit" => $request->memory,
                "time_limit" => $request->time,
                "visible_after_contest_end" => (isset($request->visibility_after_contest)) ? 1 : 0,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id
            ]);
            return redirect()->route('super-admin.question.index')->with('success', 'Problem created successfully');
        }catch (\Exception $e){
            return redirect()->route('super-admin.question.index')->with('error', $e->getMessage());
        }
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
