<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomUser extends User
{
    use HasFactory;
    protected $fillable = [
        'username', 'password', 'roll',
    ];
    
}