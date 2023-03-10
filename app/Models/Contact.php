<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    function documents()
    {
        return $this->hasMany(Document::class);
    }
}
