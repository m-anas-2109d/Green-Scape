<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categories extends Controller
{
    public function Category()
    {
        return view('PlantNest_admin.category');
    }

    public function categoryPost(Request $req)
    {
        $category = new category();
        $category->category_id = 'ct_' . uniqid();
        $category->category_name = $req->catnameinput;
        $category->category_type = $req->cattypeinput;
        $category->save();
        return redirect()->back()->with("success", "Data has been inserted");
    }

    public function FetchCategory()
    {
        $categories = category::all();
        return view('PlantNest_admin.FetchCategory', compact("categories"));
    }

    public function EditCategory($category_id)
    {
        // $type = [];
        $category = category::select('category_type')->distinct()->get();
        // foreach($category as $c){
        //     $type = $c->category_type;
        // }
        // dd($type);
        $edit = category::where('category_id', $category_id)->first();
        // echo $edit->category_id;
        // foreach($edit as $p){
        //     echo $p->category_id;
        // }
        return view("PlantNest_admin.EditCategory", compact('edit', 'category'));
    }

    public function UpdateCategory(Request $req, $category_id)
    {
        category::where('category_id', $category_id)->update([
            'category_name' => $req->catnameinp,
            'category_type' => $req->cattypeinp,
        ]);

        // $update->update();
        return redirect("/fetchcategory")->with("updateproduct", "Data has been Updated");
    }

    public function DeleteCategory($category_id)
    {
        // dd($categories);
        $delete = category::where('category_id', $category_id)->delete();
        // dd($delete);

        // $delete->delete();
        return redirect()->back()->with("delete", "Data has been Deleted");
    }
}
