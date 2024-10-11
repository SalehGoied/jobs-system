<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'department',
        'job_reference',
        'description',
        'responsibilities',
        'educational_qualifications',
        'work_experience',
        'image' // Image field
    ];

    // Relationship to Competencies
    public function competencies()
    {
        return $this->hasMany(Competency::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
