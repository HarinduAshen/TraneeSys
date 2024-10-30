<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Uniorinstitute extends Model
{
    use HasFactory;
    public function trainees()
    {
        return $this->hasMany(traineeform::class);
    }

    

}
