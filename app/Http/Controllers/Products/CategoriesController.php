<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        return view('products.category.categories' , $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_title']    = "Create A New Category";
        $this->data['mode']           = "create";
        $this->data['button']          = 'Create Now';
        
        return view("products.category.category-form" , $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           "title" => "required|unique:categories",
        ]);

        if($request->all()){
            Category::create($request->all());
             flash('Category Successfully Created!')->success();
            return redirect()->to("/categories");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['page_title']    = "Update Category";
        $this->data['mode']           = "edit";
        $this->data['category']      = Category::findOrFail($id);
        $this->data['button']          = 'Update Now';
        return view("products.category.category-form" , $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|'
        ]);

        if($request->all()){
            $cat                        =     Category::findOrFail($id);
            $cat->title              =     $request->get('title');
            
            if($cat->save()){
             flash('Category Successfully Updated!')->success();
            return redirect()->to("/categories");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::findOrFail($id)->delete()){
            Session::flash('delete_message','Category Successfully Deleted!');
            return redirect()->to("/categories");
        }
    }
}