<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Period
 * @package App\Models
 */
class Period extends Model {
    use HasFactory;

    protected $fillable = [
        'location',
        'type',
        'start_time',
        'end_time',
        'days'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'days' => 'array'
    ];

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
