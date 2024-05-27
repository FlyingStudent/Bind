<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPlace extends Model
{
    use HasFactory;
    protected $table = 'catgories_place';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function places()
    {
        return $this->hasMany(Place::class,'category_place_id');
    }
}
