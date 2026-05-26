<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'progress_record_id',
        'domain',
        'activity',
        'materials_and_procedure',
    ];

    public function progressRecord()
    {
        return $this->belongsTo(ProgressRecord::class);
    }

    public function results()
    {
        return $this->hasMany(DomainResult::class);
    }

    public function scores()
    {
        return $this->hasMany(DomainScore::class);
    }
}
