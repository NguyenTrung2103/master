<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attchment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'attachable_type',
        'attachable_id',
        'file_path',
        'file_name',
        'extension',
        'mime_type',
        'size',
    ];
}
