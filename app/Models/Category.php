<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'category_id');
    }

    public function exams()
    {
        return $this->hasMany(Exem::class, 'category_id');
    }
}
