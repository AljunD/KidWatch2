<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use HasFactory, SoftDeletes;

    // Explicit table name to match migration
    protected $table = 'domains';

    protected $fillable = [
        'progress_record_id',
        'domain',
        'activity',
        'materials_and_procedure',
    ];

    /**
     * Relationships
     */

    // Each domain belongs to one progress record
    public function progressRecord()
    {
        return $this->belongsTo(ProgressRecord::class);
    }

    // Each domain can have many results
    public function results()
    {
        return $this->hasMany(DomainResult::class);
    }

    // Each domain can have many scores
    public function scores()
    {
        return $this->hasMany(DomainScore::class);
    }
}
