<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hasCompany()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
