<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_of_week', 'start_time', 'end_time'
    ];

    // A Timeslot is associated with many Units (subjects can occur in different timeslots)
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_timeslot');
    }
}

