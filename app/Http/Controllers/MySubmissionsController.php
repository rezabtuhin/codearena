<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class MySubmissionsController extends Controller
{
    public function index(){
        $submissions = Submission::where('submitted_by', Auth::user()->id)->orderBy('submitted_at', 'desc')->paginate(10);
        return view('pages.my-submissions', ['submissions' => $submissions]);
    }
}
