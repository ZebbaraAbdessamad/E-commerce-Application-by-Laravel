<?php

namespace Modules\Frontend\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stock\Entities\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('frontend::product.cart');
    }


    /**
     * Add to Cart by method post.
     */
    public function addCart(Request $request,$id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');

        $cart[$id] = [
            "name" => $product->name,
            "category" =>$product->category->name_category,
            "quantity" => $request->input('num-product'),
            "price" => $product->price,
            "image" => $product->image,
        ];
        session()->put('cart', $cart);
         return redirect()->back()->with('Add_to_cart', 'Product added to cart successfully!');
    }

    /**
     * Add to Cart by method get.
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "category" =>$product->category->name_category,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        if(!empty(session('cart')) ){
            if($request->id && $request->quantity){
                $cart=session()->get('cart');
                $cart[$request->id]['quantity']=$request->quantity;
                session()->put('cart',$cart);
                session()->flash('edit_cart','Product updated successfully');
            }
        }else{
            return view('frontend::product.cart');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        if(!empty(session('cart')) ){
            if($request->id){
                $cart=session()->get('cart');
                if(isset($cart[$request->id])){
                    unset($cart[$request->id]);
                    session()->put('cart',$cart);
                }
                session()->flash('remove_fromCart','Product removed successfully');
            }
        }else{
            return view('frontend::product.cart');
        }
    }
}
