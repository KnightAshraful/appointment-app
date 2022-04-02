<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable=[ 'code','appointment_date','doctor_id'];

    // todo Doctor
    public function doctors()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'doctor_id');
    }
}
