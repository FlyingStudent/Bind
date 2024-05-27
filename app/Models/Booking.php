<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
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
        return $this->hasMany(Place::class,'place_id');
    }
}
