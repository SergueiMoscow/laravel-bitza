<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function building()
    {
        $this->belongsTo(Building::class);
    }

    public static function getFreeRooms()
    {
        $rooms = DB::table('freeRooms')->get();
        return $rooms;
    }
}
