<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_id',
        'division_name',
    ] ;
    protected $primaryKey = 'division_id'; // Assuming Division_id is the primary key
    public function trainees()
    {
        return $this->hasMany(traineeform::class);
    }



}
