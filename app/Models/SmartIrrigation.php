<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartIrrigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'soil_moisture',
        'ambient_temperature',
        'atmospheric_humidity',
        'cluster_zone',
        'dc_pump_status',
        'user_id'
    ];
}