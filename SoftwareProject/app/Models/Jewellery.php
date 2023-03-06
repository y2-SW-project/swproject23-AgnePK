<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewellery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'category',
        'material',
    ];
}
