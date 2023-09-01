<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable 
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'password',
        'phonenumber',
        'role',
        'email',
        'gender',
        'user_photo',
    ];
    protected $table = "student";
    protected $primarykey = "id";
    public $timestamps = false;
}
