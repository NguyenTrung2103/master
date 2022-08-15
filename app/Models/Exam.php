<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'time',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id');
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_question');
    }
}
