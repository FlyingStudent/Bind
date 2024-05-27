<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceModel extends Model
{
    use HasFactory;

    protected $table = 'places';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'location',
        'phone',
        'category_place_id',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryPlaceModel::class, 'category_place_id');
    }

    public function bookings()
    {
        return $this->hasMany(BookingModel::class,'place_id');
    }

    public function events()
    {
        return $this->hasMany(EventModel::class, 'place_id');
    }

    public function prices()
    {
        return $this->hasMany(PriceModel::class, 'place_id');
    }

}
