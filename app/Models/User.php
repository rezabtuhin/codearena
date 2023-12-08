<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the contests created by this user.
     */
    public function contestsCreated(): HasMany
    {
        return $this->hasMany(Contest::class, 'created_by');
    }

    /**
     * Get the contests updated by this user.
     */
    public function contestsUpdated(): HasMany
    {
        return $this->hasMany(Contest::class, 'updated_by');
    }

    public function problemCreated(): HasMany
    {
        return $this->hasMany(Problem::class, 'created_by');
    }

    /**
     * Get the contests updated by this user.
     */
    public function problemUpdated(): HasMany
    {
        return $this->hasMany(Problem::class, 'updated_by');
    }
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'submitted_by');
    }
}
