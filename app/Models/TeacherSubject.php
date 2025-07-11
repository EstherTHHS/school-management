<?php

namespace App\Models;

use App\Models\User;
use App\Models\YearSubject;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    protected $table = 'teacher_subjects';
    protected $fillable = [
        'teacher_id',
        'year_subject_id',
    ];

    public function yearSubject()
    {
        return $this->belongsTo(YearSubject::class, 'year_subject_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}
