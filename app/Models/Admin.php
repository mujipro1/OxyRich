<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    protected $primaryKey = "username";
    //Define relationships and customizations here

    protected $fillable = [
        'username',
        'name',
        'phone_no',
        'address',
        'email'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
