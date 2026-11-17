<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
        'name',
        'expected_cost',
        'user_id',
        'actual_cost'
    ];
}




