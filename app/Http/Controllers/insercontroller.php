<?php

namespace App\Http\Controllers;
use App\Models\flowering_plantmodel;
use Illuminate\Http\Request;
use App\Models\category;
use Doctrine\Inflector\InflectorFactory;
use Illuminate\Support\Collection;

class insercontroller extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        if($request->input('search')){
            
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('name', 'like', '%' . $searchTerm . '%')
            ->paginate();

        return view("PlantNest_USER.user_shop", compact('product', 'randomProducts'));
        }
        else{
            return redirect()->back()->with("product_not_found","Product not found");
        }

    }
    public function insertget()
    {
        $data = category::get();
        return view("/PlantNest_Admin.plant1",compact('data'));
    }
    // public function insertpost(Request $req)
    // {
    //     // $flowering_plantmodel = flowering_plantmodel::get();
    //     $flowering_plantmodel = new flowering_plantmodel();
    //     $flowering_plantmodel->name = $req->name;
    //     $flowering_plantmodel->description = $req->description;
    //     $flowering_plantmodel->   = $req->price;
    //     $flowering_plantmodel->quantity = $req->quantity;
    //     $flowering_plantmodel->plant_genes = $req->plant_genes; 
    //     $flowering_plantmodel->categories_id = $req->category_name;                                                 
    //     $image = $req->file('plantimage');
    //     $ext = rand() . "." . $image->getClientOriginalName();
    //     $image->move('images/', $ext);
    //     $flowering_plantmodel->image = $ext;
    //     $flowering_plantmodel->save();
    //     return redirect()->back()->with("productsuccess","Product has been inserted");
    // }


 // Adjust the namespace as needed
    
 public function insertpost(Request $req)
 {
     try {
        $plant_id = 'PL_'.uniqid();

         $flowering_plantmodel = new flowering_plantmodel();
         $flowering_plantmodel->plant_id = $plant_id;
         $flowering_plantmodel->name = $req->name;
         $flowering_plantmodel->description = $req->description;
         $flowering_plantmodel->price = $req->price;
         $flowering_plantmodel->quantity = $req->quantity;
         $flowering_plantmodel->plant_genes = $req->plant_genes;
         $flowering_plantmodel->categories_id = $req->category_name;
 
         $flowering_plantmodel->save(); // Save the initial data
 
         $imagePaths = [];
 
         foreach ($req->file('plantimages') as $image) {
            // echo $image;
             $ext = rand() . '.' . $image->getClientOriginalExtension();
             $image->move('images/', $ext);
 
             // Store the image path for later usage
             $imagePaths[] = $ext;
            //  echo $imagePaths;
         }
         
 
         // Update the model with the image paths
         flowering_plantmodel::where('plant_id', $plant_id)
         ->update([
             'image1' => $imagePaths[0] ?? null,
             'image2' => $imagePaths[1] ?? null,
             'image3' => $imagePaths[2] ?? null,
             'image4' => $imagePaths[3] ?? null,
         ]);

        //  echo $imagePaths[0];
        //  echo $imagePaths[1];
        //  echo $imagePaths[2];
        //  echo $imagePaths[3];
        //  foreach ($imagePaths as $i){
        //     echo $i;
        //  }
             
 
         return redirect()->back()->with("productsuccess", "Product has been inserted");
     } catch (\Exception $e) {
         return redirect()->back()->with("producterror", "An error occurred while inserting the product.");
     }
 }

    public function plant1fetch()
    {
        // echo 'done';
        $plant1 = flowering_plantmodel::all();
        // var_dump($plant1);
        return view("PlantNest_Admin.fetchproduct",compact("plant1"));
    }

    public function plant1delete($plant_id){
        $plant1 = flowering_plantmodel::where('plant_id',$plant_id)->delete();
        // $plant1->delete();
        return redirect()->back()->with("productdelete","Data has been Deleted");
    }

    public function EditCategory($plant_id){
        $update = flowering_plantmodel::where('plant_id',$plant_id)->first();
        return view("PlantNest_Admin.editplant",compact('update'));
    }

    // public function editfunctionpost(Request $req, $plant_id)
    // {
    //     $update = flowering_plantmodel::where('plant_id',$plant_id)->get();
    //     $update->name=$req->updatename;
    //     $update->description=$req->updateprice;
    //     $update->price=$req->updatedescription;
    //     $update->quantity=$req->updatequantity;
    //     $update->plant_genes=$req->updateplant_genes;
    //     $image = $req->file('updateplantimage');
    //     $ext = rand() . "." . $image->getClientOriginalName();
    //     $image->move('images/', $ext);
    //     $update->image = $ext;


    //     $image = $req->file('updateplantimage_2');
    //     $ext = rand() . "." . $image->getClientOriginalName();
    //     $image->move('images/', $ext);
    //     $update->image = $ext;



    //     $image = $req->file('updateplantimage_3');
    //     $ext = rand() . "." . $image->getClientOriginalName();
    //     $image->move('images/', $ext);
    //     $update->image = $ext;



    //     $image = $req->file('updateplantimage_4');
    //     $ext = rand() . "." . $image->getClientOriginalName();
    //     $image->move('images/', $ext);
    //     $update->image = $ext;
    //     $update->update();
    //     return redirect("/fetchplant_1")->with("productupdate" ,"Data hase been Updated");

    // }



    public function editfunctionpost(Request $req, $plant_id)
    {
        // $update = flowering_plantmodel::where('plant_id', $plant_id)->first(); // Use first() to get a single instance
        
        // $update->name = $req->updatename;
        // $update->description = $req->updateprice;
        // $update->price = $req->updatedescription;
        // $update->quantity = $req->updatequantity;
        // $update->plant_genes = $req->updateplant_genes;

        $image = $req->file('updateplantimage');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('images/', $ext);
        // $update->image1 = $ext;

        $image2 = $req->file('updateplantimage_2');
        $ext2 = rand() . "." . $image2->getClientOriginalName();
        $image2->move('images/', $ext2);
        // $update->image2 = $ext2; // Use a different property for each image

        $image3 = $req->file('updateplantimage_3');
        $ext3 = rand() . "." . $image3->getClientOriginalName();
        $image3->move('images/', $ext3);
        // $update->image3 = $ext3; // Use a different property for each image

        $image4 = $req->file('updateplantimage_4');
        $ext4 = rand() . "." . $image4->getClientOriginalName();
        $image4->move('images/', $ext4);
        // $update->image4 = $ext4; // Use a different property for each image

        // $update->save(); // Save the changes to the database
        // echo $update;
        flowering_plantmodel::where('plant_id', $plant_id)->update([
            'name' => $req->updatename,
            'description' => $req->updatedescription,
            'price' => $req->updateprice,
            'quantity' => $req->updatequantity,
            'plant_genes' => $req->updateplant_genes,
            'image1' => $ext,
            'image2' => $ext2,
            'image3' => $ext3,
            'image4' => $ext4,
        ]);


        return redirect("/fetchproduct")->with("productupdate", "Data has been updated");
    }

}