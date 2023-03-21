<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return response()->view("cms_pages.products_pages.viewProducts",["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::where("isAvailable","=","1")->get();
        return response()->view("cms_pages.products_pages.addProducts",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ["p_name"=>"required",
            "p_price"=>"required",
            ],
            ["p_name.required"=>"يجب عليك إدخال اسم المنتج الذي تريد إدخاله",
            "p_price.required"=>"يجب عليك إدخال سعر المنتج الذي تريد إدخاله"]
        );

        $product=new Product();
        $product->name=$request->get("p_name");
        $product->price=$request->get("p_price");
        $product->category_id=$request->get("category_id");

        $isSaved=$product->save();
        if($isSaved){
            session()->flash("message","تم إضافة المنتج بنجاح");
            return redirect()->back();
        }else{
            session()->flash("message","فشل إضافة المنتج ");
            return redirect()->back();
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::where("isAvailable","=","1")->get();
        $product = Product::findOrFail($id);
        return response()->view("cms_pages.products_pages.editProduct",["product"=>$product,"categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ["p_name"=>"required",
            "p_price"=>"required",
            ],
            ["p_name.required"=>"يجب عليك إدخال اسم المنتج الذي تريد إدخاله",
            "p_price.required"=>"يجب عليك إدخال سعر المنتج الذي تريد إدخاله"]
        );
        $product = Product::findOrFail($id);
        $product->name=$request->get("p_name");
        $product->price=$request->get("p_price");
        $product->category_id=$request->get("category_id");

        $isUpdated=$product->update();
        if($isUpdated){
            session()->flash("message","تم تعديل المنتج بنجاح");
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =Product::findOrFail($id);
        $isDeleted=$product->delete();
        if($isDeleted){
            return response()->json(["icon"=>"success","title"=>"تم حذف المنتج بنجاح"],200);
        }else{
            return response()->json(["icon"=>"error","title"=>"حدثت مشكلة ولم يتم حذف المنتج"],400);

        }
    }
}
