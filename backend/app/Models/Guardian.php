<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory, SoftDeletes;

    // Explicit table name to match migration
    protected $table = 'guardians';

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'contact_number',
        'address',
        'relationship_to_child',
    ];

    /**
     * Relationships
     */

    // Guardian belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Guardian has many Child records
    public function childs()
    {
        return $this->hasMany(Child::class);
    }
}
