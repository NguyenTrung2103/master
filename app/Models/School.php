<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'code',
        'address',
        'type',
        'phone',
        'hotline',
        'province_code',
        'institution_code',
        'main_branch',
        'zip_code',
        'attributte_information_setting',
        'old_school_inverstigation_number',

    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
