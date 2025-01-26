<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class broker extends Model
{
    //
    protected $table = 'brokers';


    protected $primaryKey = 'broker_id';
    // Specify the fillable fields
    protected $fillable = [
        'name',
        'phone',
        'gram_panchayat',
        'address',
    ];
}
