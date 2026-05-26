<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalAccessToken extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'last_used_at',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'tokenable_id');
    }
}
