<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DomainAssessment extends Model
{
    use HasFactory, SoftDeletes;

    // Explicit table name to match migration
    protected $table = 'domain_assessments';

    protected $fillable = [
        'progress_record_id',
        'place_administered',
        'background_observations',
        'family_environment_notes',
        'stimulating_activities_notes',
        'home_environment_notes',
        'other_notes',
    ];

    /**
     * Relationships
     */

    // Each domain assessment belongs to one progress record
    public function progressRecord()
    {
        return $this->belongsTo(ProgressRecord::class);
    }
}
