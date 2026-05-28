<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DomainScore extends Model
{
    use HasFactory, SoftDeletes;

    // Explicit table name to match migration
    protected $table = 'domain_scores';

    protected $fillable = [
        'progress_record_id',
        'domain_id',
        'raw_score',
        'scaled_score',
        'sum_scaled_score',
        'standard_score',
        'child_age',
        'interpretation_code',
    ];

    /**
     * Relationships
     */

    // Each score belongs to one progress record
    public function progressRecord()
    {
        return $this->belongsTo(ProgressRecord::class);
    }

    // Each score belongs to one domain
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
