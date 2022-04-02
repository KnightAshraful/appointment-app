<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable=[
                            'appointment_no',
                            'appointment_date',
                            'doctor_id',
                            'patient_name',
                            'patient_phone',
                            'total_fee',
                            'paid_amount'
                        ];

    // todo Doctor
    public function doctors()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'doctor_id');
    }

}
