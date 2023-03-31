<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    protected $table = 'blog_categories';
    protected $primarykey = 'id';
    protected $guared =[];

    public function blogCategory(){
        return $this->hasMany(Blog::class, "blog_category_id", "id");
    }
}
