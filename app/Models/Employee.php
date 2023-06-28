<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employee";
    protected $primaryKey = "username";
    //Define relationships and customizations here

    protected $fillable = [
        'username',
        'name',
        'phone_no',
        'address',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
