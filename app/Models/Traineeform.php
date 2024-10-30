<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traineeform extends Model
{
    use HasFactory;
    

    // Specify the table if it doesn't follow the Laravel naming convention
    protected $table = 'trainees';

    // Specify the columns that are mass assignable
    protected $fillable = [
        'name',
        'address',
        'birthday',
        'registration_number',
        'gender',
        'start_date',
        'phone_number',
        'nic',
        'image',
        'email',
        'end_date',
        'duration_id',
        'university_id',
        'degree_id',
        'supervisor_id',
        'division_id'
        
    ];

    public function university()
    {
        return $this->belongsTo(Uniorinstitute::class, 'university_id');
    }

    public function degree()
    {
        return $this->belongsTo(Degreeorcourse::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function duration()
    {
        return $this->belongsTo(Duration::class,'duration_id');
    }
    public function division()
{
    return $this->belongsTo(Division::class, 'division_id');
}

}
