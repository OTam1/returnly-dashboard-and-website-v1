<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_name',
        'color',
        'city_id',
        'city',
        'place_id',
        'place',
        'category_id',
        'category',
        'sub_category_id',
        'sub_category',
        'date',
        'time',
        'description',
        'status',
        'image',
        'qr_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
