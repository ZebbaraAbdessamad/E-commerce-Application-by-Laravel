<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->input('name_search'))
        {
            $users= User::where(function ($q) {
                $name = request()->input('name_search');
                $q->where('name', 'LIKE', '%'.$name.'%');
            })->where('id','!=',Auth::id())->paginate(4);
        }
        else{
             $users= User::where('id','!=',Auth::id())->paginate(4);
        }
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Users"),
                ],
            ],
            'users'=>$users,
            'menu'=>'users',
            'item_menu'=>'list_users',
        ];
        return view('user::users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user=new User();
        $roles=Role::cursor();
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Users"),
                    'url'=>"/users",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Add user"),
                ],
            ],
            'user'=>$user,
            'roles'=>$roles,
            'menu'=>'users',
            'item_menu'=>'add_user',
        ];

        return view('user::users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if($request->input('user_id')!=null){
            $request->validate([
                'user_name'=> 'required|string|min:5|max:255',
                'gender'=> 'required',
                'first_name'=> 'required|string|min:5|max:255',
                'last_name'=> 'required|string|max:255',
                'tele'=> 'required|numeric|min:10',
                'address'=> 'required|string|min:5|max:255',
                'country'=> 'required|string|min:5|max:255',
                'code_post'=> 'required|string|min:5|max:255',
                'city'=> 'required|string|min:5|max:255',
                'role_name'=> 'required',
                'status'=> 'required',
            ]);
            $user=User::find($request->input('user_id'));
            $user->user_name=$request->input('user_name');
            $user->gender=$request->input('gender');
            $user->name=$request->input('first_name');
            $user->last_name=$request->input('last_name');
            $user->tele=$request->input('tele');
            $user->address=$request->input('address');
            $user->country=$request->input('country');
            $user->code_post=$request->input('code_post');
            $user->city=$request->input('city');
            $user->biography=$request->input('biography');
            $user->birthday=$request->input('birthday');
            $user->status=$request->input('status');
            $user->save();

            if($request->input('role_name')!=null){
                $user->syncRoles([]);
                $role=Role::find($request->input('role_name'));
                $user->assignRole($role->name);
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $file->move(public_path('images/User'), $file->getClientOriginalName());
                $user->image= $file->getClientOriginalName();
                $user->save();
            }

            session()->flash('success','user updated successfully');
            return redirect()->back();
        }else{
            $request->validate([
                'user_name'=> 'required|string|min:5|max:255',
                'gender'=> 'required',
                'first_name'=> 'required|string|min:5|max:255',
                'last_name'=> 'required|string|max:255',
                'email'=> 'required|string|email|max:255|unique:users',
                'tele'=> 'required|numeric|min:10',
                'address'=> 'required|string|min:5|max:255',
                'country'=> 'required|string|min:5|max:255',
                'code_post'=> 'required|string|min:5|max:255',
                'city'=> 'required|string|min:5|max:255',
                'role_name'=> 'required',
                'status'=> 'required',
            ]);
            $user=new User();
            $user->user_name=$request->input('user_name');
            $user->gender=$request->input('gender');
            $user->name=$request->input('first_name');
            $user->last_name=$request->input('last_name');
            $user->email=$request->input('email');
            $user->tele=$request->input('tele');
            $user->address=$request->input('address');
            $user->country=$request->input('country');
            $user->code_post=$request->input('code_post');
            $user->city=$request->input('city');
            $user->biography=$request->input('biography');
            $user->birthday=$request->input('birthday');
            $user->status=$request->input('status');
            $user->password= Hash::make(Str::random(40));
            $user->save();

            if($request->input('role_name')!=null){
                $role=Role::find($request->input('role_name'));
                $user->assignRole($role->name);
            }

            if($request->hasFile('image')){
                $file = $request->file('image');
                $file->move(public_path('images/User'), $file->getClientOriginalName());
                $user->image= $file->getClientOriginalName();
                $user->save();
            }

            session()->flash('success','user added successfully');
            return redirect()->back();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::cursor();
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Users"),
                    'url'=>"/users",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Edit user"),
                ],
            ],
            'user'=>$user,
            'roles'=>$roles,
            'menu'=>'users',
            'item_menu'=>'list_users',
        ];

        return view('user::users.create')->with($data);
    }


    public function changePassword(Request $request )
   {
        $id=$request->input('id_user');
        $request->validate([
            'password'     => 'required|string|min:6|confirmed',
        ]);
        $user=User::find($id);
        $user->password= Hash::make($request->input('password'));
        $user->save();
        return ['success'=> __('Password changed successfully !')];
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $user=User::find($request->input('users_id'));
        if($user!=null){
            $user->delete();
            return redirect(route('users.index'))->with('success', __('User deleted !!') );
        }else{
            return redirect()->back();
        }
    }
}
