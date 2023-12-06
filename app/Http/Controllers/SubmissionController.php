<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class SubmissionController extends Controller
{
    public function submit(Request $request, Problem $problemId): void
    {
        $basePath = 'app/public/user_submission/'.Auth::user()->id;
        $filePath = time().'_'.Str::slug($problemId->title).'.'.$request->language;
        $storagePath = storage_path();
        if (!File::exists($storagePath . '/'.$basePath)) {
            File::makeDirectory($storagePath . '/'.$basePath, 0755, true);
        }
        File::put($storagePath . '/' . $basePath . '/' . $filePath, $request->code);
        $compiler = ($request->language === 'cpp') ? '/usr/bin/g++' : '/usr/bin/gcc';
        $ldPath = trim(shell_exec('which ld'));
        $compileCommand = [
            $compiler,
            '-o',
            $storagePath . '/' . $basePath,
            $storagePath . '/' . $basePath . '/' . $filePath,
            "-L$ldPath"
        ];

        $compileProcess = new Process($compileCommand);
        $compileProcess->run();
        if ($compileProcess->isSuccessful()) {
            $executablePath = $storagePath . '/' . $basePath . '/' . 'a.out';
            $runCommand = [$executablePath];
            $runProcess = new Process($runCommand);
            $runProcess->run();
            if ($runProcess->isSuccessful()) {
                $output = $runProcess->getOutput();
                dd($output);
            } else {
                $errorOutput = $runProcess->getErrorOutput();
                dd("Execution failed: " . $errorOutput);
            }
        } else {
            $compileErrorOutput = $compileProcess->getErrorOutput();
            dd("Compilation failed: " . $compileErrorOutput);
        }
    }
}
