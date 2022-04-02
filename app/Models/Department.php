<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // ? table elements
    protected $fillable=['name'];

    // todo Doctor
    public function doctors()
    {
        return $this->hasMany(\App\Models\Doctor::class);
    }
}
