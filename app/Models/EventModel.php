<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'type_id',
        'status_id',
        'place_id',
        'name',
        'additions',
        'nameOnTheCard',
        'music',
        'picture_url',
    ];
    public function user()
    {
        return $this->belongsTo(UserModel::class,'user_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeModel::class, 'type_id');
    }

    public function status()
    {
        return $this->belongsTo(StatusModel::class, 'status_id');
    }

    public function place()
    {
        return $this->belongsTo(PlaceModel::class, 'place_id');
    }

    public function parts()
    {
        return $this->belongsToMany(PartModel::class, 'event_part', 'event_id', 'part_id','id','id')
            ->withPivot('number');
    }
}
