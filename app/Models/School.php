<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
