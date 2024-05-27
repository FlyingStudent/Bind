<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPlaceModel extends Model
{
    use HasFactory;
    protected $table = 'categories_place';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function places()
    {
        return $this->hasMany(PlaceModel::class,'category_place_id');
    }
}
