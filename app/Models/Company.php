<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = ['business_name', 'status', 'vat_number', 'tax_id_code', 'activity_start_date', 'rating', 'chamber_of_commerce', 'notes', 'email', 'phone_number', 'username', 'password'];


    public function sectors()
    {
        return $this->belongsToMany(Sector::class);
    }
}
