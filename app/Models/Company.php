<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    // Specify which fields are mass-assignable
    protected $fillable = [
        'name',
        'website',
        'image',
        'email',
        'phone',
        'address',
    ];
}
