<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Degreeorcourse extends Model
{
    protected $casts = [
        'fid' => 'integer',
                       ];
    use HasFactory;
    public function trainees()
    {
        return $this->hasMany(traineeform::class);
    }


}
