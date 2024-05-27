<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceModel extends Model
{
    use HasFactory;

    protected $table = 'prices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'place_id',
        'price',
        'start_time',
        'end_time',
     ];

     public function parts()
     {
         return $this->belongsTo(PlaceModel::class, 'place_id');
     }
}
