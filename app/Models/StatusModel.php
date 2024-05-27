<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'statuses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function events()
    {
        return $this->hasMany(EventModel::class, 'status_id');
    }

}
