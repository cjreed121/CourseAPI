<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Semester
 * @package App\Models
 */
class Semester extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'start',
        'end'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function sections() {
        return $this->hasManyThrough(Section::class, Course::class);
    }
}
