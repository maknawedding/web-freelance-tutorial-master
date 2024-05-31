<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'detail',
        'notes',
        'total',
        'issued_date',
        'due_date',
        'paid_date',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getTotalIdrAttribute()
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }
}
