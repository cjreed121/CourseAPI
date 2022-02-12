<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App\Models
 */
class Course extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'course_number',
        'department',
        'credit_hours',
        'description',
        'when_offered',
        'prereqs',
        'cross_list'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function sections() {
        return $this->hasMany(Section::class);
    }
}
