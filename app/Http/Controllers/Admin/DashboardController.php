<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $request->validate([
                'contest-name' => 'required|max:255',
                'start-time' => 'required|date_format:Y-m-d\TH:i|after_or_equal:now',
                'end-time' => [
                    'required',
                    'date_format:Y-m-d\TH:i',
                    Rule::requiredIf(function () use ($request) {
                        return $request->has('start-time');
                    }),
                    'after_or_equal:start-time',
                    Rule::requiredIf(function () {
                        return now() < request('start-time');
                    }),
                ],
                'description' => 'required',
                'rules' => 'required',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg'
            ]);
            $fileName = '';
            if (isset($request->banner)){
                $fileName = time() . '.' . $request->banner->extension();
                $request->banner->storeAs('public/contest-banner', $fileName);
            }
            Contest::create([
                'name' => $request['contest-name'],
                'start_time' => $request['start-time'],
                'end_time' => $request['end-time'],
                'description' => $request['description'],
                'rule' => $request['rules'],
                'banner' => ($request->banner == null) ? 'default/default.jpg' : $fileName,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Contest created successfully');
        }catch (\Exception $e){
            return redirect()->route('admin.dashboard')->with('error', $e->getMessage());
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
