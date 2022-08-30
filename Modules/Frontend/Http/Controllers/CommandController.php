<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Frontend\Entities\Command;
use Modules\Frontend\Entities\CommandProduct;
use Modules\Frontend\Entities\Delivery;
use Modules\Frontend\Entities\Facture;
use Modules\Stock\Entities\Product;
use Illuminate\Support\Str;
use PDF;

class CommandController extends Controller
{
    //Client information
    public function add_command(Request $request)
    {
        if(Auth::user() && Auth::user()->information_etat && !empty($request->input('id_product')) ){
            if(!empty(session('cart'))){
                $request->validate([
                    'delivery_method'=> 'required',
                ]);
                if($request->input('delivery_method') == 'relay point'){
                        $request->validate([
                            'sepecified_address'=> 'required',
                        ]);
                        $dilevery=Delivery::create([
                            'method_delivery'=>$request->input('delivery_method'),
                            'description'=>$request->input('description'),
                            'sepecified_address'=>$request->input('sepecified_address'),

                        ]);
                        $command=Command::create([
                            'user_id'=>Auth::id(),
                            'delivery_id'=>$dilevery->id,
                            'slug'=>Str::slug('command'.Str::random(40), '-'),
                            'stauts_command'=>'not_yet',
                        ]);

                        $facture=Facture::create([
                            'command_id'=>$command->id,
                            'total_amount'=>$request->input('Total_amount'),
                            'quantity'=>$request->input('Total_quatity'),
                            'date_command'=>$command->created_at,
                        ]);

                        $quantities= $request->input('quantity');
                        $ids = $request->input('id_product');
                        foreach( $ids as   $key => $id ){
                            $CommandProduct= new CommandProduct();
                            $CommandProduct->command_id=$command->id;
                            $CommandProduct->product_id=$id;
                            $CommandProduct->quantity=$quantities[$key];
                            $CommandProduct->save();
                        }

                        $CommandProducts=CommandProduct::where('command_id','=',$command->id)->get();
                        $data=[
                            'downlod'=>'active',
                            'command_products'=>$CommandProducts,
                            'facture'=>$facture,
                        ];
                        session()->forget('cart');
                        return view('frontend::product.facture')->with($data );

                }else{
                    $dilevery=Delivery::create([
                        'method_delivery'=>$request->input('delivery_method'),
                        'description'=>$request->input('description'),
                    ]);
                    $command=Command::create([
                        'user_id'=>Auth::id(),
                        'delivery_id'=>$dilevery->id,
                        'slug'=>Str::slug('command'.Str::random(40), '-'),
                        'stauts_command'=>'not_yet',
                    ]);

                    $facture=Facture::create([
                        'command_id'=>$command->id,
                        'total_amount'=>$request->input('Total_amount'),
                        'quantity'=>$request->input('Total_quatity'),
                        'date_command'=>$command->created_at,
                    ]);

                    $quantities= $request->input('quantity');
                    $ids = $request->input('id_product');
                    foreach( $ids as   $key => $id ){
                        $CommandProduct= new CommandProduct();
                        $CommandProduct->command_id=$command->id;
                        $CommandProduct->product_id=$id;
                        $CommandProduct->quantity=$quantities[$key];
                        $CommandProduct->save();
                    }

                    $CommandProducts=CommandProduct::where('command_id','=',$command->id)->get();
                    $data=[
                        'downlod'=>'active',
                        'command_products'=>$CommandProducts,
                        'facture'=>$facture,
                    ];
                    session()->forget('cart');
                    return view('frontend::product.facture')->with($data );
                }
           }else{
            //session()->flash('select_command','you must create new order!!');
            return view('frontend::product.cart');
           }
        }else if(Auth::user() && Auth::user()->information_etat==0 && !empty($request->input('id_product')) ){
            if(!empty(session('cart')))
            {
                $request->validate([
                    'gender'=> 'required',
                    'country'=> 'required|string|min:3|max:255',
                    'city'=> 'required|string|min:3|max:255',
                    'address'=>  'required|string|min:3|max:255',
                    'phone'=> 'required',
                    'postal_code'=>  'required',
                    'delivery_method'=> 'required',
                ]);
                $user=Auth::user();
                $user->gender=$request->input('gender');
                $user->country=$request->input('country');
                $user->city=$request->input('city');
                $user->address=$request->input('address');
                $user->tele=$request->input('phone');
                $user->code_post=$request->input('postal_code');
                $user->information_etat=1;
                $user->save();

                if($request->input('delivery_method') == 'relay point'){
                    $request->validate([
                        'sepecified_address'=> 'required',
                    ]);
                    $dilevery=Delivery::create([
                        'method_delivery'=>$request->input('delivery_method'),
                        'description'=>$request->input('description'),
                        'sepecified_address'=>$request->input('sepecified_address'),
                    ]);

                    $command=Command::create([
                        'user_id'=>Auth::id(),
                        'delivery_id'=>$dilevery->id,
                        'slug'=>Str::slug('command'.Str::random(40), '-'),
                        'stauts_command'=>'not_yet',
                    ]);

                    $facture=Facture::create([
                        'command_id'=>$command->id,
                        'total_amount'=>$request->input('Total_amount'),
                        'quantity'=>$request->input('Total_quatity'),
                        'date_command'=>$command->created_at,
                    ]);

                    $quantities= $request->input('quantity');
                    $ids = $request->input('id_product');
                    foreach( $ids as   $key => $id ){
                        $CommandProduct= new CommandProduct();
                        $CommandProduct->command_id=$command->id;
                        $CommandProduct->product_id=$id;
                        $CommandProduct->quantity=$quantities[$key];
                        $CommandProduct->save();
                    }

                    $CommandProducts=CommandProduct::where('command_id','=',$command->id)->get();
                    $data=[
                        'downlod'=>'active',
                        'command_products'=>$CommandProducts,
                        'facture'=>$facture,
                    ];
                    session()->forget('cart');
                    return view('frontend::product.facture')->with($data);
                }else{
                    $dilevery=Delivery::create([
                        'method_delivery'=>$request->input('delivery_method'),
                        'description'=>$request->input('description'),
                    ]);
                    $command=Command::create([
                        'user_id'=>Auth::id(),
                        'delivery_id'=>$dilevery->id,
                        'slug'=>Str::slug('command'.Str::random(40), '-'),
                        'stauts_command'=>'not_yet',
                    ]);

                    $facture=Facture::create([
                        'command_id'=>$command->id,
                        'total_amount'=>$request->input('Total_amount'),
                        'quantity'=>$request->input('Total_quatity'),
                        'date_command'=>$command->created_at,
                    ]);

                    $quantities= $request->input('quantity');
                    $ids = $request->input('id_product');
                    foreach( $ids as   $key => $id ){
                        $CommandProduct= new CommandProduct();
                        $CommandProduct->command_id=$command->id;
                        $CommandProduct->product_id=$id;
                        $CommandProduct->quantity=$quantities[$key];
                        $CommandProduct->save();
                    }

                    $CommandProducts=CommandProduct::where('command_id','=',$command->id)->get();
                    $data=[
                        'downlod'=>'active',
                        'command_products'=>$CommandProducts,
                        'facture'=>$facture,
                    ];
                    session()->forget('cart');
                    return view('frontend::product.facture')->with($data );
                }
            }else{
                return view('frontend::product.cart');
            }

        }else if(empty(Auth::user())){

            return redirect()->back()->with('account_error', 'you must first create an account or log on if you have!!');

        }else if(empty($request->input('id_product'))){

            return redirect()->back()->with('command_empty', 'is impossible to do command with no products!!');
        }
    }

    //show_facteur
    public function show_facteur($id)
    {
        $facture=Facture::where('command_id','=',$id)->first();
        if($facture!=null){
            if(Auth::id()!=$facture->command->user_id){
                abort(403);
            }else{
                foreach( $facture->command->products as $product ){
                    $command_products[]=CommandProduct::where('product_id','=',$product->id)->where('command_id','=',$id)->first();
                }
                $data=[
                    'facture'=>$facture,
                    'command_products'=>$command_products,
                ];
                 $this->generateInvoicePDF($data);
                 session()->forget('cart');
                return view('frontend::product.facture')->with($data);
            }
        }else{
            abort(404);
        }
    }

    //download facture
    public function generateInvoicePDF($data)
    {
        $pdf = PDF::loadView('frontend::product.facture',['facture' => $data['facture'],'command_products' => $data['command_products']])->setOptions(['dpi' => 150,'isRemoteEnabled' => TRUE,'defaultFont' => 'sans-serif']);
        $fileName = $data['facture']->command->user->name.'_'.$data['facture']->command->user->last_name.'_'.Str::random(5).'.' . 'pdf' ;
        Storage::put('public/pdf/'.$fileName, $pdf->output());
        return $pdf->download($fileName);
    }


}
