<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=['department_id','name','phone','fee'];

    // todo Department
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    // todo Appointment
    public function appointments()
    {
        return $this->belongsTo(\App\Models\Appointment::class);
    }

    // todo Appointment
    public function Sessions()
    {
        return $this->belongsTo(\App\Models\Session::class);
    }
}
