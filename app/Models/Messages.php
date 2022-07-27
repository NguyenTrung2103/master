<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'room',
        'sender_id',
        'receiver_id',
        'receiver_type',
        'sender_type',
        'content',
        'content_tupe',
        'association_id',
        'association_type',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class);
    }
}
