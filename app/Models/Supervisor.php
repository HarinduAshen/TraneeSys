<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;  // Assuming you want to keep this trait

class Supervisor extends Model
{
    use HasFactory;
    public function trainees()
    {
        return $this->hasMany(traineeform::class);
    }

    // Optional, remove if not needed

    // Add additional fields specific to supervisors here (e.g., name, email, etc.)
}
