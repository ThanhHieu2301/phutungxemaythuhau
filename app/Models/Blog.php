<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'blog_category_id',
        'content',
        'image',
        'description', 
    ];

    protected $table = 'blogs';
    protected $primarykey = 'id';
    protected $guared =[];

    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class, "blog_category_id", "id");
    }
    
}
