<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * @package App\Models
 */
class Section extends Model {
    use HasFactory;

    protected $fillable = [
        'instruction_method',
        'section_number',
        'enrolled',
        'max_enrolled',
        'remaining',
        'instructor',
        'crn'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function periods() {
        return $this->hasMany(Period::class);
    }
}
