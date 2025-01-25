<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class broker extends Model
{
    //
    protected $table = 'brokers';

    // Specify the fillable fields
    protected $fillable = [
        'name',
        'phone',
        'gram_panchayat',
        'address',
    ];
}
