<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('s_msg')){
            Alert::success('Create Successfull' , 'Data Successfully Create!', 'success');
        }

        if(Session::has('u_msg')){
            Alert::success('Update Successfull' , 'Data Successfully Updated!', 'success');
        }
        $this->data['products'] = Product::all();
        return view('products.products.products' , $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories']    = Category::arrayOfCategories();
        $this->data['page_title']    = "Create A New Product";
        $this->data['mode']           = "create";
        $this->data['button']          = 'Create Now';

        return view("products.products.product-form" , $this->data);
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
            'category_id'      => 'required',
            'title'                   => 'required|max:100|unique:products',
            'description'       => 'required|max:1000|min:500|unique:products',
            'cost_price'         => 'required|numeric',
            'price'                 => 'required|numeric'
        ]);
    
        if($request->all()){
            Product::create($request->all());
           Session::flash('s_msg','Success');
            return redirect()->to("/products");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::findOrFail($id);
        return view('products.products.show' , $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['categories']    = Category::arrayOfCategories();
        $this->data['page_title']    = "Update Product";
        $this->data['mode']           = "edit";
        $this->data['button']          = 'Update Now';

        $this->data['product']    =  Product::findOrFail($id);
        return view('products.products.product-form'  , $this->data);
        
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
                    'category_id'      => 'required',
                    'title'                   => 'required|max:100|unique:products,title,'.$id,
                    'description'       => 'required|max:1000|min:500',
                    'cost_price'         => 'required|numeric',
                    'price'                 => 'required|numeric'
                ]);

        if($request->all()){
             $product                             =  Product::findOrFail($id);
             $product->title                   =   $request->title;
             $product->description       =   $request->description;
             $product->category_id      =   $request->category_id;
             $product->cost_price        =   $request->cost_price;
             $product->price                =   $request->price;

            if($product->save()){
            Session::flash('u_msg','Data Successfully Updated!');
            return redirect()->to('/products');
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
        if(Product::findOrFail($id)->delete()){
            return redirect()->to('products');
            }
     

  }
}