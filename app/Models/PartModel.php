<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartModel extends Model
{
    use HasFactory;
    protected $table = 'parts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'price',
        'picture_url',
        'assessment',
        'category_part_id',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryPartModel::class, 'category_part_id');
    }

public function events()
{
    return $this->belongsToMany(EventModel::class, 'event_part', 'part_id', 'event_id','id','id')
        ->withPivot('number');
}
}
