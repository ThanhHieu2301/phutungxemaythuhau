<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function show_role(Request $request)
    {
        $datas = Role::all();
        if($request->has('search_role'))
        {
            $datas = Role::where('name', 'like', '%' .$request->search_role . '%')->paginate(8);
        }else
        {
            $datas =  Role::paginate(8);
        }
        return view('dashboard.role.index',compact('datas'));
    }
    public function add_role()
    {
        $permissions = Permission::all();
        return view('dashboard.role.create',compact('permissions'));
    }
    public function role(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
        ]);

        $role->permissions()->attach($request->permission_id);
        return redirect()->route('admin.role');


    }
}

