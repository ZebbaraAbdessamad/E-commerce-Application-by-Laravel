<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->input('name_search'))
        {
            $permissions= Permission::where(function ($q) {
                $name = request()->input('name_search');
                $q->where('name', 'LIKE', '%'.$name.'%');
            })->paginate(4);
        }
        else{
             $permissions=Permission::paginate(4);
        }
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Permissions"),
                ],
            ],
            'permissions'=> $permissions,
            'menu'=>'roles_permission',
            'item_menu'=>'list_permmissions',
        ];
        return view('user::permissions.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $permission=New Permission();
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Permissions"),
                    'url'=>"/permissions",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Add Permission"),
                ],
            ],
            'menu'=>'roles_permission',
            'item_menu'=>'add_permission',
            'permission'=>$permission,
        ];
        return view('user::permissions.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission_name'=>'required|string',
            'permission_description'=>'required|string',
        ]);
        if($request->input('permission_id') != null){
            $id=$request->input('permission_id');
            $permission = Permission::find($id);
            $permission->name=$request->input('permission_name');
            $permission->description=$request->input('permission_description');
            $permission->save();
            return redirect(route('permissions.edit',['permission' => $permission->id]))->with('update_Permission', __('permission updated  successuflly') );
        }
        else{
            $permission = new Permission();
            $permission->name=$request->input('permission_name');
            $permission->description=$request->input('permission_description');
            $permission->save();
            return redirect(route('permissions.create'))->with('create_Permission', __('Permission created successuflly') );
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $permission=Permission::find($id);
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Permissions"),
                    'url'=>"/permissions",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Edite Permission"),
                ],
            ],
            'menu'=>'roles_permission',
            'item_menu'=>'list_permissions',
            'permission'=>$permission,
        ];

        return view('user::permissions.create')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $permission=Permission::find($request->input('permission_id'));
        if($permission!=null){
            $permission->delete();
            return redirect(route('permissions.index'))->with('success', __('Permission Deleted !!') );
        }else{
            return redirect()->back();
        }
    }
}
