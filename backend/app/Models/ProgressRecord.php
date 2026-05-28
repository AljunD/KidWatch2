<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgressRecord extends Model
{
    use HasFactory, SoftDeletes;

    // Explicit table name to match migration
    protected $table = 'progress_records';

    protected $fillable = [
        'child_id',
        'teacher_id',
        'assessment_date',
        'assessment_number',
        'status',
    ];

    /**
     * Relationships
     */

    // Each progress record belongs to one child
    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    // Each progress record belongs to one teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Each progress record has many domains
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    // Each progress record has many domain scores
    public function domainScores()
    {
        return $this->hasMany(DomainScore::class);
    }

    // Each progress record has one domain assessment
    public function domainAssessment()
    {
        return $this->hasOne(DomainAssessment::class);
    }
}
