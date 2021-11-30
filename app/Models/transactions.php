<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'reporter_id',
        'driver_id',
        'report_image',
        'picked_image',
        'finished_image',
        'address_detail',
        'status',
        'latitude',
        'longitude'
    ];
}
