<?php

namespace App\Http\Controllers;

use App\Models\add_to_cart;
use App\Models\checkout;
use App\Models\flowering_plantmodel;
use App\Models\review;
use App\Models\temp_verfy;
use App\Models\user_contact;
use App\Models\user_registration;
use App\Models\wishlist;
use DB;
use Illuminate\Http\Request; // Import the Collection class
use Illuminate\Support\Collection;
use Mail;

class Plantnest_user extends Controller
{
    public function user_index()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(4);

        $products2 = flowering_plantmodel::where('categories_id', 'ct_64d7bc82647fa')->get();

        $randomProductss = Collection::make($products2)->shuffle()->take(4);

        $products3 = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProductsss = Collection::make($products3)->shuffle()->take(4);

        $products4 = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProductssss = Collection::make($products4)->shuffle()->take(4);

        return view("PlantNest_USER.user_index", compact('randomProducts', 'randomProductsss', 'randomProductss', 'randomProductssss'));
    }

    public function user_about()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();
        $randomProducts = Collection::make($products)->shuffle()->take(2);

        return view("PlantNest_USER.user_about", compact('randomProducts'));
    }

    public function user_contact()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();
        $randomProducts = Collection::make($products)->shuffle()->take(2);

        return view("PlantNest_USER.user_contact", compact('randomProducts'));
    }

    public function reviews()
    {
        return view("PlantNest_USER.reviews");
    }

    public function reviewsrating(Request $req)
    {
        // if(!Auth::check()){
        //     $message = "Login to rate this Product!";
        //     return redirect()->back()->with('errormessage',$message);
        // }

        if (session('sessionuseremail')) {
            $contact = new review();
            // $contact['rating'] = json_encode($req->rate);
            $contact->review_id = 'Rv_' . uniqid();
            $contact->rating = $req->rate;
            $contact->review = $req->review;
            $contact->user_registrations_id = session('sessionid');
            $contact->save();
            return redirect()->back()->with("successmessage", "Review Submitted Successfully!");
        } else {
            return redirect()->back()->with("errormessage", "Login First");

        }

    }

    public function user_shop_details($id)
    {
        $detail = flowering_plantmodel::where('plant_id', $id)->first();
        $products = flowering_plantmodel::get();

        $randomProducts = Collection::make($products)->shuffle()->take(4);
        return view("PlantNest_USER.user_shop-details", compact('detail', 'randomProducts'));
    }

    public function checkLowStock(Request $request)
    {
        $response = [];

        try {
            // Perform logic to check low stock here
            // You can retrieve the product IDs from the request and check their stock levels

            // For demonstration purposes, let's assume low stock is true if any product has less than 5 quantity
            $lowStock = DB::table('flowering_plantmodels')
                ->whereIn('plant_id', $request->plant_id)
                ->where('quantity', '<', 5)
                ->exists();

            $response['lowStock'] = $lowStock;
        } catch (\Exception $e) {
            $response['error'] = $e->getMessage();
        }

        return response()->json($response);
    }
    public function user_shop()
    {
        $product = flowering_plantmodel::paginate(12);
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();
        $randomProducts = Collection::make($products)->shuffle()->take(2);

        return view("PlantNest_USER.user_shop", compact('product', 'randomProducts'));
    }

    public function wishlist()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $wishlist = flowering_plantmodel::join('wishlists', 'wishlists.product_id', 'flowering_plantmodels.plant_id')
            ->where('user_id', session('sessionid'))->get();
        return view("PlantNest_USER.user_wish_list", compact('wishlist' , 'randomProducts'));
    }

    public function user_order_histroy()
    {
        $checkout = checkout::join('flowering_plantmodels', 'flowering_plantmodels.id', 'checkouts.product_id')
            ->select('checkouts.id as checkid', 'flowering_plantmodels.name as name', 'checkouts.status as status', 'checkouts.grand_total as grand_total', 'checkouts.sub_total as sub_total', 'checkouts.created_at as created_at')
            ->where('status', 1)->get();
        // echo $checkout;
        return view("PlantNest_USER.user_order_histroy", compact('checkout'));
    }
    public function update_status1($eid)
    {
        $empid = $eid;
        //    echo $empid;
        checkout::where('id', $empid)->update([
            'status' => 1,
        ]);
        // $data = checkout::where('id', $empid)->first();
        //    $employee->status=1;
        //    $employee->update();
        // return $data;
        //    return redirect()->back();
    }

    public function update_status0(Request $req)
    {
        $empid = $req->eid;
        //    echo $empid;
        checkout::where('id', $empid)->update([
            'status' => 0,
        ]);
        // $data = checkout::where('id', $empid)->first();
        //    $employee->status=1;
        //    $employee->update();
        // return $data;
        //    return redirect()->back();
    }

    public function user_contact_post(Request $req)
    {
        $contact = new user_contact();
        $contact->contact_id = 'fd_' . uniqid();
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->subject = $req->subject;
        $contact->message = $req->message;
        $contact->save();
        return redirect()->back()->with("contactsuccess", "Thanks ! Your Message Will Be Received");
    }

    public function user_feedback()
    {
        return view("PlantNest_USER.user_feedback");
    }

    public function user_cart()
    {
        // $add_to_cart = add_to_cart::where("user_id" , session('sessionid'))->first();

        $add_to_cart = flowering_plantmodel::join('add_to_carts', 'add_to_carts.product_id', 'flowering_plantmodels.plant_id')
            ->where('add_to_carts.user_id', session('sessionid'))->get();
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();
        $randomProducts = Collection::make($products)->shuffle()->take(2);

        return view("PlantNest_USER.user_cart", compact('add_to_cart', 'randomProducts'));
    }

    public function user_checkout()
    {
        $checkout = flowering_plantmodel::join('add_to_carts', 'add_to_carts.product_id', 'flowering_plantmodels.plant_id')
            ->where('add_to_carts.user_id', session('sessionid'))->get();

        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();
        $randomProducts = Collection::make($products)->shuffle()->take(2);

        return view("PlantNest_USER.user_checkout", compact('checkout', 'randomProducts'));
    }

    public function profile()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $profile = user_registration::where("email", session('sessionuseremail'))->get();
        return view("PlantNest_USER.user_profile", compact('profile' ,'randomProducts'));
    }

    public function get_data_update(Request $req)
    {

        // Update profile
        $profile = user_registration::where("email", session('sessionuseremail'))->first();
        $profile->first_name = $req->first_name;
        $profile->last_name = $req->last_name;
        $profile->contact_no = $req->contact_no;
        $profile->password = $req->password;
        $image = $req->file('image');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('images/', $ext);
        $profile->profile_image = $ext;
        $profile->save();

        // Update profile
        $temp_profile = temp_verfy::where("email", session('sessionuseremail'))->first();
        $temp_profile->first_name = $req->first_name;
        $temp_profile->last_name = $req->last_name;
        $temp_profile->contact_no = $req->contact_no;
        $temp_profile->password = $req->password;
        $temp_profile->profile_image = $ext;
        $temp_profile->save();

        return redirect()->back()->with("updatesuccesscomp", "Data has been updated");
    }

    public function product_insert(Request $req)
    {

        // Validate the incoming request data
        $validatedData = $req->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Get the user's session ID
        $sessionId = session('sessionid');

        // Fetch the correct product_id from the form data
        $productId = $validatedData['product_id'];

        // Attempt to update or insert the product in the cart
        try {
            $product_insert = add_to_cart::updateOrInsert(
                [
                    'product_id' => $productId,
                    'user_id' => $sessionId,
                ],
                [
                    'quantity_add' => $validatedData['quantity'],
                    'total_price' => $validatedData['total_price'],
                    'updated_at' => now(), // Update the 'updated_at' timestamp
                ]
            );

            // Rest of your code...
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the database operation
            return response()->json(['message' => 'An error occurred while updating or inserting wishlist item']);
        }

    }

    public function wishlist_insert(Request $req)
    {

        $wishlist = Wishlist::updateOrInsert(
            [
                'product_id' => $req->product_id,
                'user_id' => session('sessionid'),
            ],
            [
                // Add any updated values here if you want to modify the existing record.
                // For example: 'updated_at' => now()
            ]
        );

        if ($wishlist) {
            return response()->json(['message' => 'Wishlist item updated or inserted successfully']);
        } else {
            return response()->json(['message' => 'updating or inserting wishlist item']);
        }

    }
    public function update_cart(Request $request)
    {
        $productId = $request->input('productId');
        $newValue = $request->input('newValue');

        // Update the quantity and total price in the database based on product ID
        $cartItem = add_to_cart::where('product_id', $productId)->first();

        if ($cartItem) {
            // Get the price from the other table based on the product ID
            $floweringPlant = flowering_plantmodel::where('plant_id', $cartItem->product_id)->first();

            if ($floweringPlant) {
                // Update the quantity and calculate the total price
                $cartItem->quantity_add = $newValue;
                $cartItem->total_price = $floweringPlant->price * $newValue;

                $cartItem->save();

                return response()->json(['message' => 'Cart item updated successfully', 'total_price' => $cartItem->total_price]);
            } else {
                return response()->json(['error' => 'Flowering plant not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Cart item not found'], 404);
        }
    }

    public function add_cart_delet($id)
    {
        $add_to_cart = add_to_cart::where('product_id', $id);

        // dd($id);
        $add_to_cart->delete();
        return redirect()->back()->with("productdelete", "Data has been Deleted");
    }

    public function check_out(Request $req)
{
    // Get the user's cart items
    $cartItems = DB::table('add_to_carts')
        ->where('user_id', session('sessionid'))
        ->get();

    $totalItemCount = 0;
    $ship = 5.00; // Initialize the ship variable

    // Calculate total item count
    foreach ($cartItems as $cartItem) {
        $totalItemCount += $cartItem->quantity_add;
    }

    // Loop through cart items and insert into checkout table
    foreach ($cartItems as $cartItem) {
        // Update the quantity in the flowering_plantmodels table
        DB::table('flowering_plantmodels')
            ->where('plant_id', $cartItem->product_id)
            ->decrement('quantity', $cartItem->quantity_add);

        $check_out = new Checkout();
        $check_out->name = $req->first_name;
        $check_out->email = $req->email_address;
        $check_out->phone = $req->contact_no;
        $check_out->payment_method = $req->cash_delivery;
        $check_out->order_number = 'od_' . uniqid();
        $check_out->shipping_number = $req->shipping_method;
        $check_out->grand_total = $req->grand_total;
        $check_out->sub_total = $totalItemCount;
        $check_out->status = 0; // Assuming you want to insert 'Book' here
        $check_out->user_registrations_id = session('sessionid');
        $check_out->product_id = $cartItem->product_id;

        $check_out->save();

        // Delete the cart item
        DB::table('add_to_carts')
            ->where('user_id', session('sessionid'))
            ->where('product_id', $cartItem->product_id)
            ->delete();

        $data = ['Std_Name' => $check_out->name, 'data' => $check_out->name];
        $user['to'] = $check_out->email;

        Mail::send('PlantNest_USER.product', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Plant Nest!');
        });
    }

    return redirect("/")->with('success', 'Order has been successfully placed');
}
    public function delet_wish($id)
    {
        $add_to_cart = wishlist::where('product_id', $id);

        // dd($id);
        $add_to_cart->delete();
        return redirect()->back()->with("productdelete", "Data has been Deleted");
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('name', 'like', '%' . $searchTerm . '%')
            ->paginate();

        return view("PlantNest_USER.user_shop", compact('product', 'randomProducts'));
    }

    public function followingplants()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);

        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bc3f8c1d0')->paginate(12);
        return view("PlantNest_USER.floweringplant", compact('product', 'randomProducts'));
    }

    public function acceseeories()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bd7759e22')->paginate(12);
        return view("PlantNest_USER.accessories", compact('product', 'randomProducts'));
    }

    public function indoorplant()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bc68740be')->paginate(12);
        return view("PlantNest_USER.indoorplant", compact('product', 'randomProducts'));
    }

    public function outdoorplant()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bc91c4751')->paginate(12);
        return view("PlantNest_USER.outdoorplant", compact('product', 'randomProducts'));
    }

    public function succulent()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bc9c5e0b7')->paginate(12);
        return view("PlantNest_USER.succulents", compact('product', 'randomProducts'));
    }

    public function medicinal()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->paginate(12);
        return view("PlantNest_USER.medicinal", compact('product', 'randomProducts'));
    }
    public function non_floweringplant()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $product = flowering_plantmodel::where('categories_id', 'ct_64d7bc82647fa')->paginate(12);
        return view("PlantNest_USER.non_floweringplant", compact('product', 'randomProducts'));
    }
    public function add_to()
    {
        $products = flowering_plantmodel::where('categories_id', 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(2);
        $productsCount = add_to_cart::where('user_id', session('sessionid'))->count();
        return view("PlantNest_USER.user_layout", compact('productsCount', 'randomProducts'));

    }

    

}
