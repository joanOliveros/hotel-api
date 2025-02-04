<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'room_type_id'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
