<?php

namespace Modules\Stock\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stock\Entities\Category;
use Modules\Stock\Entities\Product;
use Modules\Stock\Entities\Stock;

class StockController extends Controller
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
            $stocks=Stock::whereHas('product', function($q){
                $name = request()->input('name_search');
                $q->where('name', 'like', '%'.$name.'%');
            })->paginate(3);
        }
        else{
             $stocks=Stock::paginate(3);
        }
        $data=[
            'menu'=>'product',
            'item_menu'=>'list_stock',
            'breadcrumbs'=>[
                [
                    'name'=>__("stock"),
                ],
             ],
            'stocks'=>$stocks,
        ];
        return view('stock::Stocks.index')->with($data);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $stock=Stock::find($request->input('id_stock'));
        if($stock!=null){
            $product=Product::where('id','=',$stock->product_id)->first();
            if(!empty($product)){
                $product->status=0;
                $product->save();
            }
            $stock->delete();
            return redirect(route('stock.index'))->with('delete_stock', __('stock Deleted !!') );
        }else{
            return redirect()->back();
        }
    }

    public function add_quantity(Request $request)
    {
        $request->validate([
            'stock_quantity'=>'required',
        ]);
        $stock=Stock::where('id','=',$request->input('hidden_id_stock'))->first();
        $stock->quantity+=$request->input('stock_quantity');
        $stock->save();
        return redirect(route('stock.index'))->with('add_quantity','Quantity added successuflly');
    }

}
