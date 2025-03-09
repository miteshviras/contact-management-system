<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_categories');
    }
}
