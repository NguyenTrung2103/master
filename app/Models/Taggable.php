<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function taggable()
    {
        return $this->belongsTo(User::class);
    }
}