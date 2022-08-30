<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Frontend\Entities\Command;
use Modules\Frontend\Entities\CommandProduct;
use Modules\Frontend\Entities\Facture;

class UserController extends Controller
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
        $user=Auth::user();
        $data=[
             'breadcrumbs'=>[
                [
                    'name'=>__("Profile"),
                    // 'url'=>"/user/profile",
                    // 'class' => 'active'
                ],
             ],
            'user'=>$user,
            'menu'=>'profile',
        ];
        return view('frontend::user.profile')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update_profile(Request $request)
    {
        $id=$request->input('id_user');
        $user=User::where('id','=',$id)->first();
        $request->validate([
            'user_name'=> 'required|string|min:5|max:255',
            'first_name'=> 'required|string|min:5|max:255',
            'last_name'=> 'required|string|max:255',
            'phone'=> 'required|numeric|min:10',
            'country'=> 'required|string|min:5|max:255',
            'code_post'=> 'required|string|min:5|max:255',
            'city'=> 'required|string|min:5|max:255',
            'gender'=> 'required',
            'address'=> 'required|string|min:5|max:255',
        ]);

        $user->name=$request->input('first_name');
        $user->last_name=$request->input('last_name');
        $user->tele=$request->input('phone');
        $user->country=$request->input('country');
        $user->code_post=$request->input('code_post');
        $user->city=$request->input('city');
        $user->biography=$request->input('biography');
        $user->user_name=$request->input('user_name');
        $user->address=$request->input('address');
        $user->birthday=$request->input('birthday');
        $user->gender=$request->input('gender');
        $user->save();

        if($request->hasFile('image_prof')){
			$file = $request->file('image_prof');
            $file->move(public_path('images/User'), $file->getClientOriginalName());
            $user->image= $file->getClientOriginalName();
            $user->save();
        }

        session()->flash('update_profile','your profile has been  successfully updated');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function change_password()
    {
        $data=[
            'breadcrumbs'=>[
               [
                   'name'=>__("Profile"),
                   'url'=>"/user/profile",
                   'class' => 'active'
               ],
               [
                'name'=>__("Change Password"),
               ],
            ],
            'menu'=>'password',
       ];
        return view('frontend::user.change_password')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function changepass(Request $request)
    {
       $user=Auth::user();
        // if (!Auth::user()->hasPermissionTo('user_edit')) {
        //     abort(403);
        // }
        $request->validate([
            'current_password'=>'required',
        ]);
        $new_password = $request->input('new_password');
        if(!(Hash::check($request->input('current_password'),  $user->password))){
            return redirect()->back()->with("error_old_password", __("Your current password does not matches with the password you provided. Please try again."));
        }else{
            $request->validate([
                'new_password'    => 'required|min:6|max:255|confirmed',
                'new_password_confirmation' => 'required',
            ]);

            $user->password = bcrypt($new_password);
            $user->save();
            return redirect()->back()->with('success_password', __('Password updated!'));
        }
    }

    public function commands()
    {
        $user=Auth::user();
        $commands=Command::where('user_id','=',$user->id)->paginate(6);

        if(count($commands) > 0){
            foreach($commands as $comd){
                $factures[]=Facture::where('command_id','=',$comd->id)->first();
            }
        }else{
            $factures=null;
        }

        $data=[
             'breadcrumbs'=>[
                [
                    'name'=>__("Profile"),
                    'url'=>"/user/profile",
                    'class' => 'active'
                ],
                [
                    'name'=>__("Orders"),
                ],
             ],
            'user'=>$user,
            'menu'=>'commands_show',
            'commands'=>$commands,
            'factures'=>$factures,
        ];
        return view('frontend::user.commands')->with($data);
    }

    public function commands_details($slug)
    {
        $command=Command::where('slug','=',$slug)->first();
        if( $command!= null){
            $command_products=CommandProduct::where('command_id','=',$command->id)->get();
            $facture=Facture::where('command_id','=',$command->id)->first();
            if(Auth::id()!=$command->user_id){
                abort(403);
            }
            $data=[
                'breadcrumbs'=>[
                    [
                        'name'=>__("Profile"),
                        'url'=>"/user/profile",
                        'class' => 'active'
                    ],
                    [
                        'name'=>__("Orders"),
                        'url'=>"/user/profile/commands",
                        'class' => 'active'
                    ],
                    [
                    'name'=>__("Details"),
                    ],
                ],
                'command'=>$command,
                'facture'=>$facture,
                'command_products'=>$command_products,
            ];
            return view('frontend::user.details_command')->with($data);
        }else{
            abort(404);
        }


    }
}
