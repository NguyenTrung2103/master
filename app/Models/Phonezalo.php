<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonezalo extends Model
{
    use HasFactory;

    protected $table = 'phonezalo';

    protected $fillable = [
        'id',
        'phone',
        'customer_id',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'id');
    }
}
