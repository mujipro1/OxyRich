<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'daily_expenses';

    protected $primaryKey = 'created_at';
    public $incrementing = false;

    // Define fillable columns if necessary
    protected $fillable = [
        'petrol_expense',
        'employee_wage',
        'filling_charges',
        'no_of_daily_bottles',
    ];
}
