<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Problem;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class SubmissionController extends Controller
{
    function checkEligibility(string $id): bool
    {
        $contest = Contest::find($id);
        $current_time = now()->setTimezone('Asia/Dhaka');
        if ($contest->start_time <= $current_time && $contest->end_time > $current_time) {
            return true;
        } else {
            return false;
        }
    }

    function checkIfHasAcceptedSolution(string $problemId, $userId, $contestId){
        return Submission::where('problem_id', $problemId)->where('submitted_by', $userId)->where('contest_id', $contestId)->where('verdict', 1)->first();
    }

    function checkIfHasWrongSolution(string $problemId, $userId, $contestId){
        return Submission::where('problem_id', $problemId)->where('submitted_by', $userId)->where('contest_id', $contestId)->where('verdict', 0)->count();
    }

    /**
     * @throws \Exception
     */
    private function differenceInTime(\DateTime $current_Time, $start_time)
    {
        $currentTime = Carbon::parse($current_Time);
        $startTime = Carbon::parse($start_time, "Asia/Dhaka");
        return $startTime->diffInMinutes($currentTime);
    }

    /**
     * @throws \Exception
     */
    public function submit(Request $request, Problem $problem): Application|RedirectResponse|Redirector|\Illuminate\Foundation\Application
    {
        $currentTime = new \DateTime("Asia/Dhaka");
        $verdict = 1;
        $status = "";
        $score = 0;
        $isEligible = $this->checkEligibility($problem->contest_id);
        $basePath = 'app/public/user_submission/' . Auth::user()->id;
        $filePath = time() . '_' . Str::slug($problem->title) . '.' . $request->language;
        $storagePath = storage_path();
        if (!File::exists($storagePath . '/' . $basePath)) {
            File::makeDirectory($storagePath . '/' . $basePath, 0755, true);
        }
        File::put($storagePath . '/' . $basePath . '/' . $filePath, $request->code);

        $sample_input = 'public/problems/'.$problem->sample_input;
        $sample_output = 'public/problems/'.$problem->sample_output;
        $sample_input_data = Storage::get($sample_input);
        $sample_output_data = Storage::get($sample_output);
        $full_input = 'public/problems/'.$problem->actual_input;
        $full_output = 'public/problems/'.$problem->actual_output;
        $full_input_data = Storage::get($full_input);
        $full_output_data = Storage::get($full_output);

        $judges_test_cases = [
            [$sample_input_data, $sample_output_data],
            [$full_input_data, $full_output_data]
        ];
        $pythonFilePath = $storagePath . '/' . $basePath . '/' . $filePath;

        $maxExecutionTime = $problem->time_limit;
        $maxMemoryUsage = $problem->memory_limit * 100 * 100;

        foreach ($judges_test_cases as $judges_test_case) {
            $startTime = microtime(true);
            $startMemory = memory_get_usage();
            $command = ["python3", $pythonFilePath];
            $process = new Process($command);
            $process->setInput($judges_test_case[0]);
            $process->start();
            $process->setTimeout($problem->time_limit);
            $process->wait(function ($type, $buffer) use ($maxExecutionTime, $maxMemoryUsage, $startTime, $startMemory) {
                $currentTime = microtime(true);
                $currentMemory = memory_get_usage();
                if ($currentMemory - $startMemory > $maxMemoryUsage) {
                    return false;
                }
                if ($currentTime - $startTime > $maxExecutionTime) {
                    return false;
                }
                return true;
            });
            $endTime = microtime(true);
            $endMemory = memory_get_usage();

            if ($process->isRunning()) {
                $process->stop();
                $status = "Time Limit Exceeded";
                $verdict = 0;
                break;
            }
            if (!$process->isSuccessful()) {
                $status = "Compilation error";
                $verdict = 0;
                break;
            }
            $actualOutput = $process->getOutput();
            if ($actualOutput !== $judges_test_case[1]) {
                $status = "Output didn't match";
                $verdict = 0;
                break;
            }
            if ($endMemory - $startMemory > $maxMemoryUsage) {
                $status = "Memory limit exceeded";
                $verdict = 0;
                break;
            }
        }
        if ($verdict){
            $hasAcceptedSubmission = (bool)$this->checkIfHasAcceptedSolution($problem->id, Auth::user()->id, $problem->contest_id);
            if (!$hasAcceptedSubmission && $isEligible){
                $checkIfHasWrongSolution = $this->checkIfHasWrongSolution($problem->id, Auth::user()->id, $problem->contest_id);
                $penalty = $checkIfHasWrongSolution * 10 + $this->differenceInTime($currentTime, Contest::find($problem->contest_id)->start_time);
                $score = $penalty;
            }
            else{
                $score = $this->checkIfHasAcceptedSolution($problem->id, Auth::user()->id, $problem->contest_id)['score'];
            }
            Submission::create([
                'problem_id' => $problem->id,
                'contest_id' => $isEligible ? $problem->contest_id : null,
                'submitted_by' => Auth::user()->id,
                'language' => $request->language,
                'code' => $request->code,
                'verdict' => 1,
                'status' => "accepted",
                'score' => $score
            ]);
        }
        else{
            Submission::create([
                'problem_id' => $problem->id,
                'contest_id' => $isEligible ? $problem->contest_id : null,
                'submitted_by' => Auth::user()->id,
                'language' => $request->language,
                'code' => $request->code,
                'verdict' => 0,
                'status' => $status,
                'score' => $score
            ]);
        }
        return redirect('/my-submissions');
    }
}
