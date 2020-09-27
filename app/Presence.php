<?php

namespace App;

/**
* comment to test git 2
*/

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = [
        'class_id',
        'teacher_id',
        'student_id',
        'presence_date',
        'presence_status'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function class() {
        return $this->belongsTo(Grade::class);
    }
}
