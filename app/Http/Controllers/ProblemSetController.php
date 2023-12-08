<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemSetController extends Controller
{
    public function index(){
        $problems = Problem::where('visible_after_contest_end', 1)->whereHas('contest', function ($query) {
            $query->where('end_time', '<', now()->setTimezone("Asia/Dhaka"));
        })->paginate(20);
        return view('pages.problem-set', compact('problems'));
    }
}
