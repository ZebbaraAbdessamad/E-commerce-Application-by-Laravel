<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Roles"),
                ],
            ],
            'roles'=> Role::paginate(4),
            'menu'=>'roles_permission',
            'item_menu'=>'list_role',
        ];
        return view('user::roles.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $role=New Role();
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Roles"),
                    'url'=>"/roles",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Add role"),
                ],
            ],
            'menu'=>'roles_permission',
            'item_menu'=>'add_role',
            'role'=>$role,
        ];
        return view('user::roles.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name'=>'required|string',
        ]);

        if($request->input('hidden_id') != null){
            $id=$request->input('hidden_id');
            $role = Role::find($id);
            $role->name=$request->input('role_name');
            $role->save();
            return redirect(route('roles.edit',['role' => $role->id]))->with('success', __('role updated  successuflly') );
        }
        else{
            $role = new Role();
            $role->name=$request->input('role_name');
            $role->save();
            return redirect(route('roles.create'))->with('success', __('Role created successuflly') );
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $role=Role::find($id);
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Roles"),
                    'url'=>"/roles",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Edite role"),
                ],
            ],
            'menu'=>'roles_permission',
            'item_menu'=>'list_role',
            'role'=>$role,
        ];

        return view('user::roles.create')->with($data);
    }


    public function role_permission(){
        $roles=Role::cursor();
        $permissions=Permission::cursor();

        $permissions_group = [
            'other' => []
        ];
        if (!empty($permissions)) {
            foreach ($permissions as $permission) {
                $sCheck = strpos($permission->name, '_');
                if ($sCheck == false) {
                    $permissions_group['other'][] = $permission;
                    continue;
                }
                $grName = substr($permission->name, 0, $sCheck);
                if (!isset($permissions_group[$grName]))
                    $permissions_group[$grName] = [];
                $permissions_group[$grName][] = $permission;
            }
        }
        if (empty($permissions_group['other'])) {
            unset($permissions_group['other']);
        }

        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Roles"),
                    'url'=>"/roles",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Roles & Permissions"),
                ],
            ],
            'menu'=>'roles_permission',
            'item_menu'=>'matrix',
            'roles'=>$roles,
            'permissions_group'=>$permissions_group,
        ];
        return view('user::roles.matrix')->with($data);
    }

    public function give_rolePermission(Request $request){

        $matrix = $request->input('matrix');
        $matrix = is_array($matrix) ? $matrix : [];
        if (!empty($matrix)) {
            foreach ($matrix as $role_id => $permissionIds) {
                $role = Role::find($role_id);
                if (!empty($role)) {
                    $permissions = Permission::find($permissionIds);
                    $role->syncPermissions($permissions);
                }
            }
        }
        return redirect()->back()->with('success_matirx', __('Permission matrix updated'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $role=Role::find($request->input('role_id'));
        if($role!=null){
            $role->delete();
            return redirect(route('roles.index'))->with('delete_role', __('Role Deleted !!') );
        }else{
            return redirect()->back();
        }
    }
}
