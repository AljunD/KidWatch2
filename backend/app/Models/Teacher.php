<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    // Explicit table name to match migration
    protected $table = 'teachers';

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'contact_number',
        'address',
    ];

    /**
     * Relationships
     */

    // Teacher belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Teacher has many ProgressRecords
    public function progressRecords()
    {
        return $this->hasMany(ProgressRecord::class);
    }
}
