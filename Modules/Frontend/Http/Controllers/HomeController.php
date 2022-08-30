<?php

namespace Modules\Frontend\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stock\Entities\Category;
use Modules\Stock\Entities\Product;
use Modules\Stock\Entities\Image;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories=Category::where('etat_category','=',1)->take(6)->get();
        $products=Product::where('status','=',1)->get();
        $example_category=Category::where('etat_category',1)->first();
        $example_products=Product::where('category_id','=',$example_category->id)->where('status','=',1)->take(8)->get();
        $data=[
            'categories'=>$categories,
            'products'=>$products,
            'example_category'=>$example_category,
            'example_products'=>$example_products,
        ];
        return view('welcome')->with($data);
    }


    public function shop(Request $request)
    {
        $categories=Category::where('etat_category','=',1)->take(6)->get();

        if($request->input('name_search'))
        {
            $products= Product::where(function ($q) {
                $name = request()->input('name_search');
                $q->where('name', 'LIKE', '%'.$name.'%');
            })->where('status','=',1)->paginate(8);
        }
        else{
            $products=Product::where('status','=',1)->paginate(8);
        }
        $data=[
            'categories'=>$categories,
            'products'=>$products,
        ];

        return view('frontend::shop.index')->with($data);
    }


    public function about()
    {
        return view('frontend::about.index');
    }


    public function contact()
    {
        return view('frontend::contact.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        $product = Product::where('slug','=',$slug)->first();
        $products= Product::where('category_id','=',$product->category->id)->take(16)->get();
        $data=[
            'product'=>$product,
            'products'=>$products,
        ];
        return view('frontend::product.details')->with($data);
    }



}
