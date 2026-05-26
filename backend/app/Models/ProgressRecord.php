<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgressRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'assessment_date',
        'assessment_number',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function domainScores()
    {
        return $this->hasMany(DomainScore::class);
    }

    public function domainAssessment()
    {
        return $this->hasOne(DomainAssessment::class);
    }
}
