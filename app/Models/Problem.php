<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = [
        'contest_id',
        'title',
        'description',
        'attachments',
        'hints',
        'sample_input',
        'sample_output',
        'actual_input',
        'actual_output',
        'memory_limit',
        'time_limit',
        'visible_after_contest_end',
        'created_by',
        'updated_by',
    ];

    // Define the relationships

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class, 'contest_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
