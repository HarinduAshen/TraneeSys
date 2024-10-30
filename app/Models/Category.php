<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_id',
        'count',
        'type'

    ];
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'division_id');
    }
}
