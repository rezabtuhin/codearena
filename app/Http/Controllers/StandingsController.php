<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Problem;
use App\Models\Submission;

class StandingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Contest $contest)
    {
        $totalDistinctUsers = Submission::where('contest_id', $contest->id)->select('submitted_by')->distinct()->get();
        $submissions = array();
        foreach ($totalDistinctUsers as $user) {
            $userId = $user->submitted_by;
            $solved = Submission::where('contest_id', $contest->id)->where('submitted_by', $userId)->select('problem_id')->distinct()->orderBy('problem_id')->pluck('problem_id');
            $penalty = 0;
            foreach ($solved as $problemId) {
                $submissionsForProblem = Submission::where('contest_id', $contest->id)
                    ->where('submitted_by', $userId)
                    ->where('problem_id', $problemId)
                    ->orderBy('submitted_at')
                    ->get();
                $wrongCount = 0;
                foreach ($submissionsForProblem as $singleSubmission){
                    if ($singleSubmission->verdict == 0){
                        $wrongCount++;
                    }
                    else{
                        $history = ["problem"=>$problemId,"wrong"=>$wrongCount, "submitted_at"=>$singleSubmission->submitted_at];
                        $submissions[$userId]['solved'][$problemId] = $history;
                        $penalty+=$singleSubmission->score;
                        break;
                    }
                }
            }
            $solved = count($submissions[$userId]['solved']);
            $submissions[$userId]['totalSolved'] = $solved;
            $submissions[$userId]['penalty'] = $penalty;
            $submissions[$userId]['user'] = $userId;
        }
        usort($submissions, function ($a, $b) {
            if ($a['totalSolved'] != $b['totalSolved']) {
                return $b['totalSolved'] - $a['totalSolved'];
            }
            return $a['penalty'] - $b['penalty'];
        });
        $problems = Problem::where('contest_id', $contest->id)->orderby('id')->pluck('id');
        return view('pages.standings', compact('contest', 'submissions', 'problems'));
    }
}
