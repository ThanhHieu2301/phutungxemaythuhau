<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'category_id',
        'time_start',
        'time_end',
    ];
    
    
    public function productInsurance(){
        return $this->belongsTo(ProductCategory::class, "category_id", "id");
    }
  
}
