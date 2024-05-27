<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;


    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'start_date',
        'end_date',
        'place_id',
    ];
    public function places()
    {
        return $this->hasMany(PlaceModel::class,'place_id');
    }
}
