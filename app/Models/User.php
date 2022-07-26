<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function taggables()
    {
        return $this->belongsToMany(Taggable::class);
    }
    public function messages()
    {
        return $this->belongsToMany(Messages::class);
    }
}
