<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // public function permission(){
    //     return $this->belongsTo(Role::class, "role_id", "id");
    // }
    // public function permissionsChildrent()
    // {
    //     return $this->hasMany(Permission::class, 'parent_id');
    // }

}
