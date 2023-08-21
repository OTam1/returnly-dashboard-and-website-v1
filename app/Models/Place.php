<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'city_id',
        'place_name_en',
        'place_name_ar',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
