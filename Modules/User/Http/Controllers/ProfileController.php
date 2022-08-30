<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("profile"),
                ],
            ],
            'user'=>$user,
         ];
        return view('user::profile.index')->with($data);
    }

    public function update(Request $request)
    {
        $user=Auth::user();

        $request->validate([
            'gender'=> 'required',
            'first_name'=> 'required|string|min:5|max:255',
            'last_name'=> 'required|string|max:255',
            'tele'=> 'required|numeric|min:10',
            'address'=> 'required|string|min:5|max:255',
            'country'=> 'required|string|min:5|max:255',
            'city'=> 'required|string|min:5|max:255',
        ]);
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
        $user->save();

        if($request->hasFile('image')){
			$file = $request->file('image');
            $file->move(public_path('images/User'), $file->getClientOriginalName());
            $user->image= $file->getClientOriginalName();
            $user->save();
        }

        session()->flash('EditPrf','your profile has been  successfully updated');
        return redirect()->back();
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

}
