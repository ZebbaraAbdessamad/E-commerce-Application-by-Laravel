<?php

namespace Modules\Stock\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stock\Entities\Category;
use Modules\Stock\Entities\Image;
use Modules\Stock\Entities\Product;
use Illuminate\Support\Str;
use Modules\Stock\Entities\Stock;

class ProductController extends Controller
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
            $products= Product::where(function ($q) {
                $name = request()->input('name_search');
                $q->where('name', 'LIKE', '%'.$name.'%');
            })->paginate(4);
        }
        else{
             $products=Product::paginate(4);
        }
        $data=[
            'menu'=>'product',
            'item_menu'=>'list',
             'breadcrumbs'=>[
                [
                    'name'=>__("Stock"),
                    'url'=>"/stock",
                    'class' => 'active'
                ],
                [
                    'name'=>__("products"),
                ],
             ],
            'products'=>$products,
        ];

        return view('stock::products.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $catgories=Category::cursor();
        $data=[
            'menu'=>'product',
            'item_menu'=>'add',
            'breadcrumbs'=>[
                    [
                        'name'=>__("Stock"),
                        'url'=>"/stock",
                        'class' => 'active'
                    ],
                    [
                        'name'=>__("products"),
                        'url'=>"/products",
                        'class' => 'active'

                    ],
                    [
                        'name'=>__("add product"),
                    ],
                 ],
               'catgories'=>  $catgories,
        ];
        return view('stock::products.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_product'=> 'required|string|min:3|max:255',
            'price'=> 'required',
            'description'=> 'required|string',
            'name_cat'=> 'required',
            'principe'=> 'required',
            'img_product'=>'max:3',
            'status'=> 'required',
            'stock_quantity'=>'required',
        ]);
        $product=Product::create([
           'name' => $request->input('name_product'),
           'price'=>$request->input('price'),
           'slug'=>Str::slug($request->input('name_product').Str::random(40), '-'),
           'description'=>$request->input('description'),
           'category_id'=>$request->input('name_cat'),
           'status'=>$request->input('status'),
        ]);

        if($request->hasFile('principe') ){
            $file = $request->file('principe');
            $file->move(public_path('images/Products/'.$product->category->name_category), $file->getClientOriginalName());
            $product->image= $file->getClientOriginalName();
            $product->save();
        }

        if($request->hasFile('img_product'))
        {
			$files=$request->file('img_product');
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images/Products/'.$product->category->name_category), $name);
                $images_arry[] = $name;
            }
            foreach($images_arry as $image_arry){
                $image= New Image();
                $image->name=$image_arry;
                $image->product_id=$product->id;
                $image->save();
            }
        }
        $stock=Stock::create([
            'product_id'=>$product->id,
            'quantity'=>$request->input('stock_quantity'),
            'status'=>1,
        ]);
        session()->flash('cerate_product','your product has been  successfully added');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('stock::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $catgories=Category::cursor();
        $data=[
            'menu'=>'product',
            'item_menu'=>'list',
            'breadcrumbs'=>[
                [
                    'name'=>__("Stock"),
                    'url'=>"/stock",
                    'class' => 'active'
                ],
                [
                    'name'=>__("products"),
                    'url'=>"/products",
                    'class' => 'active'

                ],
                [
                    'name'=>__("edit product"),
                ],
             ],
            'product'=>$product,
            'catgories'=>$catgories,
        ];
        return view('stock::products.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $request->validate([
            'name_product'=> 'required|string|min:3|max:255',
            'price_product'=> 'required',
            'description_product'=> 'required',
            'name_cat'=> 'required',
            'date_product'=> 'required|date',
            'img_product'=> 'max:3',
            'status'=> 'required',

        ]);

        $test=0;
        if($request->hasFile('principe') ){
            $file = $request->file('principe');
            $file->move(public_path('images/Products/'.$product->category->name_category), $file->getClientOriginalName());
            $product->image= $file->getClientOriginalName();
            $product->save();
        }
        if($request->hasFile('img_product'))
        {   $n=1;
            foreach($product->images as $image){
                if($image->name!=null){
                    $n++;
                }
            }
            if($n <= 3){
                $files=$request->file('img_product');
                foreach($files as $file ){
                    if($n <= 3){
                        $name=$file->getClientOriginalName();
                        $file->move(public_path('images/Products/'.$product->category->name_category), $name);
                        $images_arry[] = $name;
                        $n++;
                    }
                }
                foreach($images_arry as $image_arry){
                    $image= New Image();
                    $image->name=$image_arry;
                    $image->product_id=$product->id;
                    $image->save();
                }
            }else{
                $test=1;
                session()->flash('max_imges','images product must not be greater than 3 characters.!!');
            }

        }
        $product->status=$request->input('status');
        $product->slug= Str::slug($request->input('name_product').Str::random(40), '-');
        $product->name=$request->input('name_product');
        $product->price=$request->input('price_product');
        $product->description=$request->input('description_product');
        $product->category_id=$request->input('name_cat');
        $product->created_at=$request->input('date_product');
        $product->save();
        if($test==0){
        session()->flash('update_product','your product has been  successfully updated');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $product=Product::find($request->input('id'));
        if ($product != null) {
            $product->delete();
            return redirect(route('products.index'))->with('delete_product', __('product Deleted !!') );
        }else{
            return redirect()->back();
        }

    }

    public function remove($id)
    {
        $image=Image::find($id);
        if ($image != null) {
            $image->delete();
        }
        return redirect()->back()->with('delete_image', __('image Deleted !!') );
    }
}
