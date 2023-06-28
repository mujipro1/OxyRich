<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $primaryKey = "username";
    //Define relationships and customizations here

    protected $fillable = [
        'username',
        'name',
        'phone_no',
        'address',
        'sector',
        'bottle_price',
        'no_of_bottles',
        'email',
        'per_bottle_security',
        'total_bottle_security',
        'no_of_dispenser',
        'per_dispenser_security',
        'total_dispenser_security',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

}
