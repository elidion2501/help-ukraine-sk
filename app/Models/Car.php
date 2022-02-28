<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $with = ['cityFrom', 'cityTo'];
    public function cityFrom()
    {
        return $this->belongsTo(City::class, 'city_from_id');
    }
    
    public function cityTo()
    {
        return $this->belongsTo(City::class, 'city_to_id');
    }
}
