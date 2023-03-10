<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_ordered',
        // 'user_id',
        // 'jewellery_id'
    ];
    //can have many jewellery (hasMany jewellery)
    //one order can belong to one user(belongs to user)
    public function jewellery()
    {
        return $this->belongToMany('App\Models\Jewellery', 'Order');
    }
    public function User()
    {
        return $this->belongTo(User::class);
    }
}
