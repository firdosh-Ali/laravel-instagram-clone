<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $guard_name = 'web'; 
}
