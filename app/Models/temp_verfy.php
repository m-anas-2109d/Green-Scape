<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp_verfy extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'code',  // Add this line to allow mass assignment for the 'code' column
    ];
}
