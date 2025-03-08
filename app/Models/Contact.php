<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    // Specify which fields are mass-assignable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'position',
        'department',
        'address',
        'notes',
        'company_id',
    ];

    /**
     * Get the company that owns the contact.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
