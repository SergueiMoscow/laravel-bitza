<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    function payments()
    {
        return $this->hasMany(Payment::class);
    }

    function room()
    {
        return $this->belongsTo(Room::class);
    }

    function building()
    {
        return $this->belongsTo(Building::class);
    }

    function contractForm()
    {
        return $this->belongsTo(ContractForm::class);
    }
}
