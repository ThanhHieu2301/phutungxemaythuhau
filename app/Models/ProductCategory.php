<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $table = 'product_categories';
    protected $primarykey = 'id';
    protected $guared =[];

    public function products(){
        return $this->hasMany(Product::class, "product_category_id", "id");
    }

    public function productInsurance(){
        return $this->hasMany(Insurance::class, "category_id", "id");
    }
}
