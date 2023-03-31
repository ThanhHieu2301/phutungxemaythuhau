<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'messages',
        'rating',
        'product_id',
    ];

    protected $table = 'product_comments';
    protected $primarykey = 'id';
    protected $guared =[];

    public function product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    public function customer(){
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }
}
