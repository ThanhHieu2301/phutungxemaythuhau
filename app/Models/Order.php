<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 
    use HasFactory;

    // protected $table = 'orders';
    // protected $primarykey = 'id';
    // protected $guared =[];
    protected $fillable = ['full_name','street_address','zip','city','district','email','phone','payment_type','check_shipping','transport'];


    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function product_order()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')->withPivot(['qty','total']);
    }

    public function product_order2()
    {
        return $this->belongsToMany(OrderDetail::class, 'order_details', 'order_id', 'product_id');
    }
}
