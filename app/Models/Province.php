<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_code','code');
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}