<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flowering_plantmodel extends Model
{
    use HasFactory;
    protected $table = 'flowering_plantmodels';

    // Make sure you have the quantity property defined as well
    protected $fillable = [
        'quantity',
        // Other columns...
    ];
}
