<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruits extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'genus',
    //     'name',
    //     'family',
    //     'order',
    //     'protein',
    //     'carbohydrates',
    //     'fat',
    //     'calories',
    //     'sugar',
    // ];

    protected $primarykey = 'id';

    protected $table = 'fruits';
    public $timestamps = false;


}