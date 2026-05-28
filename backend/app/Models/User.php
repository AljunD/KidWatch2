<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;

    // Explicit table name to match migration
    protected $table = 'users';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    /**
     * Hidden attributes for arrays
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts for attributes
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Override default email verification notification
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }

    /**
     * Relationships
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function personalAccessTokens()
    {
        return $this->morphMany(PersonalAccessToken::class, 'tokenable');
    }

    public function passwordResetTokens()
    {
        return $this->hasMany(PasswordResetToken::class, 'email', 'email');
    }
}
