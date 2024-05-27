<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function events()
    {
        return $this->hasMany(EventModel::class, 'type_id');
    }
}
