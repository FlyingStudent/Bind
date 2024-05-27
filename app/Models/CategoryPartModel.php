<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPartModel extends Model
{
    use HasFactory;
    protected $table = 'categories_part';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function category()
    {
        return $this->hasMany(PartModel::class,'category_part_id');
    }
}
