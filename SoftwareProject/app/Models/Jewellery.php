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
    //can be saved by many users (saved_items) (belongs to Saved_items)
    //can be in many orders (order) (belongs to order)
    public function orders()
    {
        return $this->belongToMany('App\Models\Order', 'Order');
    }
    public function users()
    {
        return $this->belongToMany('App\Models\User', 'saved_item');
    }
}
