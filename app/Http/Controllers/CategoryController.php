<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();

        return response()->view("cms_pages.categorisePages.viewCategories",["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view("cms_pages.categorisePages.addCategory");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ["c_name" => "required|min:2"],
            [
                "c_name.required" => "يجب عليك إدخال اسم الصنف الذي تريد إضافته",
                "c_name.min" => "يجب أن لا يقل عدد أحرف اسم الصنف عن حرفين"
            ]
        );

        $category=new Category();
        $category->name=$request->get("c_name");
        $category->isAvailable=$request->get("available_status")==1?true:false;
        $isSaved=$category->save();
        if($isSaved){
            session()->flash("message","تمت إضافة الصنف بنجاح");
            return redirect()->back();
        }else{
            session()->flash("message","فشل إضافة الصنف ");
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
        $category=Category::findOrFail($id);
        return response()->view("cms_pages.categorisePages.editCategory",["category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ["c_name" => "required|min:2"],
            [
                "c_name.required" => "يجب عليك إدخال اسم الصنف الذي تريد إضافته",
                "c_name.min" => "يجب أن لا يقل عدد أحرف اسم الصنف عن حرفين"
            ]
        );
        $category = Category::findOrFail($id);
        $category->name=$request->get("c_name");
        $category->isAvailable=$request->get("available_status")==1?true:false;
        $isUpdated=$category->update();
        if($isUpdated){
            session()->flash("message","تمت عملة التحديث بنجاح");
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        $isDeleted=$category->delete();
        if($isDeleted){
            return response()->json(["icon"=>"success","title"=>"تم حذف الصنف بنجاح"],200);
        }else{
            return response()->json(["icon"=>"error","title"=>"حدثت مشكلة ولم يتم حذف الصنف"],400);

        }
    }
}
