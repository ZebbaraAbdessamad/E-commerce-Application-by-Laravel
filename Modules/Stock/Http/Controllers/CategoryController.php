<?php

namespace Modules\Stock\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stock\Entities\Category;
use Modules\Stock\Entities\Product;
use Modules\Stock\Entities\Stock;

class CategoryController extends Controller
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
            $categories= Category::where(function ($q) {
                $name = request()->input('name_search');
                $q->where('name_category', 'LIKE', '%'.$name.'%');
            })->paginate(3);
        }
        else{
             $categories=Category::paginate(3);
        }
        $data=[
            'menu'=>'category',
            'item_menu'=>'list',
            'breadcrumbs'=>[
                [
                    'name'=>__("categories"),
                    // 'url'=>"/categories",
                    // 'class' => 'active'

                ],
             ],
            'categories'=>$categories,
        ];
        return view('stock::Categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data=[
            'menu'=>'category',
            'item_menu'=>'add',
            'breadcrumbs'=>[
                    [
                        'name'=>__("categories"),
                        'url'=>"/categories",
                        'class' => 'active'

                    ],
                    [
                        'name'=>__("add Category"),
                    ],
                 ],
        ];
        return view('stock::Categories.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $categry=new Category();
        $request->validate([
            'name_cat'=> 'required|string|min:3|max:255',
            'etat_cat'=> 'required',
            'img_cat'=> 'required|file',
        ]);
        if($request->hasFile('img_cat')){
			$file = $request->file('img_cat');
            $file->move(public_path('images/Categories/icons'), $file->getClientOriginalName());
            $categry->image_category=$file->getClientOriginalName();
            $categry->save();
        }
        $categry->name_category=$request->input('name_cat');
        $categry->etat_category=$request->input('etat_cat');
        $categry->save();

        session()->flash('cerate_category','your category has been successfully added');
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
        $category=Category::find($id);
        $data=[
            'menu'=>'category',
            'item_menu'=>'list',
            'breadcrumbs'=>[
                [
                    'name'=>__("categories"),
                    'url'=>"/categories",
                    'class' => 'active'

                ],
                [
                    'name'=>__("edit Category"),
                ],
             ],
            'category'=>$category,
        ];
        return view('stock::Categories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $categry=Category::find($id);
        $request->validate([
            'name_cat'=> 'required|string|min:3|max:255',
            'etat_cat'=> 'required',
        ]);
        if($request->hasFile('img_cat')){
			$file = $request->file('img_cat');
            $file->move(public_path('images/Categories'), $file->getClientOriginalName());
            $categry->image_category=$file->getClientOriginalName();
            $categry->save();
        }
        $categry->name_category=$request->input('name_cat');
        $categry->etat_category=$request->input('etat_cat');
        $categry->save();
        session()->flash('update_category','your category has been  successfully updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $category=category::find($request->input('id'));
        if($category!=null){
            $category->delete();
            return redirect(route('categories.index'))->with('delete_ctegory', __('category Deleted !!') );
        }else{
            return redirect()->back();
        }

    }
}
