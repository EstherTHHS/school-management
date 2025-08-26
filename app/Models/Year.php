<?php

namespace App\Models;

use App\Models\StudentYear;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'name',
        'is_active',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'year_subjects', 'year_id', 'subject_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_years', 'year_id', 'student_id');
    }

    public function studentYears()
    {
        return $this->hasMany(StudentYear::class);
    }
}
