<?php

namespace Modules\Stock\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Frontend\Entities\Command;
use Modules\Frontend\Entities\CommandProduct;
use Modules\Frontend\Entities\Facture;
use Modules\Stock\Entities\Stock;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->input('name_search'))
        {
            $commands=Command::where(function($q){
                $name = request()->input('name_search');
                $q->where('created_at', 'like', '%'.$name.'%');
            })->paginate(4);
        }
        else{
             $commands=Command::orderBy('created_at', 'desc')->paginate(4);
        }
        $data=[
            'menu'=>'commands',
            'item_menu'=>'list_Commands',
            'breadcrumbs'=>[
                [
                    'name'=>__("Orders"),
                ],
             ],
            'commands'=>$commands,
        ];
        return view('stock::orders.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function setting($slug)
    {
        $command=Command::where('slug','=',$slug)->first();
        if( $command!= null){

            $data=[
                'menu'=>'commands',
                'item_menu'=>'list_Commands',
                'breadcrumbs'=>[
                    [
                        'name'=>__("Orders"),
                        'url'=>"/orders",
                        'class' => 'active'
                    ],
                    [
                        'name'=>__("Setting"),
                    ],
                 ],
                'command'=>$command,
            ];
            return view('stock::orders.setting')->with($data);
        }else{
            return redirect()->back();
        }

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function status_setting(Request $request)
    {
        $command=Command::where('id','=',$request->input('id_command'))->first();
        if($command!=null){
            if($request->input('status')=='processing'){
                $a=0;
                foreach($command->products as $product){
                    $stock=Stock::where('product_id','=',$product->id)->first();
                    $command_products=CommandProduct::where('command_id','=',$command->id)->get();
                    foreach($command_products as $com_pro){
                        if($com_pro->product_id==$product->id){
                            if(!empty($stock)){
                                if($stock->quantity < $com_pro->quantity){
                                   $a++;
                                }
                            }
                        }
                    }
                }
                $command->stauts_command=$request->input('status');
                $command->save();
                if($a!=0){
                    return redirect()->back()->with('error_sup_quantity','Quantity is unavailaible,you must to add new quantity product !!');
                }else{
                    return redirect()->back()->with('sucess_sup_quantity','this order is on processing');
                }
            }
            if($request->input('status')=='command_processed' &&  $command->stauts_command =='processing'){
                foreach($command->products as $product){
                    $stock=Stock::where('product_id','=',$product->id)->first();
                    $command_products=CommandProduct::where('command_id','=',$command->id)->get();
                    foreach($command_products as $com_pro){
                        if($com_pro->product_id==$product->id){
                            if(!empty($stock)){
                                if($stock->quantity > $com_pro->quantity){
                                    $stock->quantity-=$com_pro->quantity;
                                    $stock->save();
                                }else if($stock->quantity - $com_pro->quantity ==0){
                                    $stock->quantity-=$com_pro->quantity;
                                    $product->status=0;
                                    $product->save();
                                    $stock->save();
                                }
                            }
                        }
                    }
                }
                $command->stauts_command=$request->input('status');
                $command->save();
                return redirect()->back()->with('sucess_order','this order is processed successfully');
            }else{
                return redirect()->back()->with('error_order','you must process the order first !!');
            }
        }
    }


    public function details($slug)
    {
        $command=Command::where('slug','=',$slug)->first();
        if( $command!= null){
            $command_products=CommandProduct::where('command_id','=',$command->id)->get();
            $facture=Facture::where('command_id','=',$command->id)->first();
            $data=[
                'menu'=>'commands',
                'item_menu'=>'list_Commands',
                'breadcrumbs'=>[
                    [
                        'name'=>__("Orders"),
                        'url'=>"/orders",
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
            return view('stock::orders.details')->with($data);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $command=Command::find($request->input('id_order'));
        if ($command != null) {
            $command->delete();
            return redirect(route('orders.index'))->with('delete_order', __('Order deleted !!') );
        }else{
            return redirect()->back();
        }
    }
}
