<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plantnest_user;
use App\Http\Controllers\PlantNest_Admin;
use App\Http\Controllers\login_register;
use App\Http\Controllers\categories;
use App\Http\Controllers\insercontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// PlantNest User Routes

Route::get("/", [Plantnest_user::class, 'user_index']);
Route::get("/about", [Plantnest_user::class, 'user_about']);
Route::get("/contact", [Plantnest_user::class, 'user_contact']);
Route::post("/contact_", [Plantnest_user::class, 'user_contact_post']);
Route::get("/contactdetails", [PlantNest_Admin::class, 'contact_details']);
Route::get("/shop_details/{id}", [Plantnest_user::class, 'user_shop_details']);
Route::get("/shop", [Plantnest_user::class, 'user_shop']);
Route::get("/floweringplant", [Plantnest_user::class, 'flowering_plant']);
Route::get("/cart", [Plantnest_user::class, 'user_cart']);
Route::get("/checkout", [Plantnest_user::class, 'user_checkout']);
Route::get("/feedback", [Plantnest_user::class, 'user_feedback']);
Route::post("/feedbackpost", [PlantNest_Admin::class, 'Feedback']);
Route::get("/feedbackdetails", [PlantNest_Admin::class, 'FeedbackDetails']);
Route::post("/reviewsrating", [Plantnest_user::class, 'reviewsrating']);
Route::post("/check_low_stock", [Plantnest_user::class, 'reviewsrating'])->name('check_low_stock');
// routes/web.php

// Route::post('/check_low_stock', 'CartController@checkLowStock')->name('check_low_stock');



// PlantNest Admin Routes
Route::get('/adminlayout',[PlantNest_Admin::class,'PlantNest_AdminLayout']);
Route::get('/admindashboard',[PlantNest_Admin::class,'AdminDashboard']);
Route::get('/category',[categories::class,'Category']);
Route::post('/categorypost',[categories::class,'categoryPost']);
Route::get('/fetchcategory',[categories::class,'FetchCategory']);
Route::get('/editcategory/{id}',[categories::class,'EditCategory']);
Route::post('/updatecategory/{id}', [categories::class,'UpdateCategory']);
Route::get('/deleteCategory/{id}',[categories::class,'DeleteCategory']);
Route::get('/shop/{id}',[categories::class,'DeleteCategory']);
Route::get('/followingplants',[Plantnest_user::class,'followingplants']);
Route::get('/accessories',[Plantnest_user::class,'acceseeories']);
Route::get('/indoorplant',[Plantnest_user::class,'indoorplant']);
Route::get('/outdoorplant',[Plantnest_user::class,'outdoorplant']);
Route::get('/succulent',[Plantnest_user::class,'succulent']);
Route::get('/medicinal',[Plantnest_user::class,'medicinal']);
Route::get('/non_floweringplant',[Plantnest_user::class,'non_floweringplant']);

// insert product 1 crud
Route::get("/Plant1", [insercontroller::class,'insertget']);
Route::post("/plant_1", [insercontroller::class,'insertpost']);
Route::get("/fetchproduct", [insercontroller::class,'plant1fetch']);
Route::get('/deleteplant/{id}',[insercontroller::class,'plant1delete']);
Route::get('/updaterecord/{id}',[insercontroller::class,'EditCategory']);
Route::post('/update_record/{plant_id}',[insercontroller::class,'editfunctionpost']);



// Login Routes
Route::get('/login',[login_register::class,'login']);
// Route::get('/register',[login_register::class,'register']);
Route::post('/register',[login_register::class,'registerpost']);

Route::post('/loginadminpost',[login_register::class,'loginadminpost']);


Route::post("/input", [login_register::class, 'input']);
Route::get("/register", [login_register::class, 'get_email']);
Route::get("/code_match", [login_register::class, 'code_match']);
Route::post("/code_match_", [login_register::class, 'code_match_']);

Route::get("/logout", [login_register::class,'logout']);
Route::get("/profile", [Plantnest_user::class,'profile']);
Route::post('/update_company/{id}', [Plantnest_user::class, 'get_data_update']);


// product insert
Route::post('/product_insert', [Plantnest_user::class, 'product_insert']);
Route::post('/wishlist_insert', [Plantnest_user::class, 'wishlist_insert']);
Route::post('/update_cart', [Plantnest_user::class, 'update_cart']);
Route::get('/add_cart_delet/{id}',[Plantnest_user::class,'add_cart_delet']);



// checkout 
Route::get('/user_checkout', [Plantnest_user::class, 'user_checkout']);
Route::POST('/check_out', [Plantnest_user::class, 'check_out']);

// order history
Route::get('/user_order_histroy', [Plantnest_user::class, 'user_order_histroy']);
Route::POST('/check_status/{id}', [Plantnest_user::class, 'check_status']);

Route::post('/updatestatus1/{eid}',[Plantnest_user::class,'update_status1']);
Route::post('/updatestatus0',[Plantnest_user::class,'update_status0']);


// wishlist 
Route::get('/wishlist', [Plantnest_user::class, 'wishlist']);
Route::get('/delet_wish/{id}',[Plantnest_user::class,'delet_wish']);

Route::get("/checkout", [Plantnest_user::class, 'user_checkout']);
Route::get("/feedback", [Plantnest_user::class, 'user_feedback']);
Route::post("/feedbackpost", [PlantNest_Admin::class, 'Feedback']);
Route::get("/feedbackdetails", [PlantNest_Admin::class, 'FeedbackDetails']);
Route::get("/feedback_fetch", [PlantNest_Admin::class, 'Feedback_fetch']);
Route::post("/search", [insercontroller::class, 'Search']);
Route::get("/orders", [PlantNest_Admin::class, 'checkout']);
Route::get("/review", [PlantNest_Admin::class, 'reviews']);


Route::get('/userinfo',[PlantNest_Admin::class,'userfetch']);



// forgetpassword
Route::get('/password/reset/email', [login_register::class, 'showResetEmailForm']);
Route::post('/password/reset/send-code', [login_register::class, 'sendResetCode']);
Route::get('/password/reset/code', [login_register::class, 'showResetCodeForm']);
Route::post('/password/reset', [login_register::class, 'resetPassword']);