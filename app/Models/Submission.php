<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'problem_id',
        'contest_id',
        'submitted_by',
        'language',
        'code',
        'verdict',
        'status',
        'score'
    ];

    public function problem()
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class, 'contest_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
}
