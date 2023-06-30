<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "order_no";
    //Define relationships and customizations here

    protected $fillable = [
        'order_no',
        'order_date',
        'username',
        'type',
        'quantity',
        'bottle_price',
        'total_amount',
        'bill_no'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'username');
    }
}

