<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
        return $this->belongsTo(User::class,'user_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function parts()
    {
        return $this->belongsToMany(Part::class, 'event_part', 'event_id', 'part_id','id','id')
            ->withPivot('number');
    }
}
