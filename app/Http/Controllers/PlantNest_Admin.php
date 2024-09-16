<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use App\Models\user_registration;
use App\Models\user_contact;
use App\Models\checkout;
use App\Models\review;
use App\Models\user;
use App\Models\flowering_plantmodel;




class PlantNest_Admin extends Controller
{
    public function AdminDashboard(){
        // Get the count of orders with status 0 (assuming status column exists)
        $inactiveOrderCount = Checkout::where('status', 0)->count();
        $reviews = review::count();
        // $checkout = checkout::count();
        $users = user_registration::count();
        $totalproducts = flowering_plantmodel::where('quantity', '<>', 0)->count();
        $totalSum = flowering_plantmodel::where('quantity', '<>', 0)->sum('quantity');
    
        return view('PlantNest_Admin.AdminDashboard', compact('inactiveOrderCount','reviews','users','totalproducts','totalSum'));
    }

    public function PlantNest_AdminLayout(Request $req){

    
        return view('PlantNest_Admin.AdminLayout');
        }

    public function Feedback(Request $req){
        $feedback = new feedback();
        $feedback->feedback_id ='f_'.uniqid();;
        $feedback->name = $req->nameinp;
        $feedback->email = $req->emailinp;
        $feedback->phone = $req->numberinp;
        $feedback->feedback = $req->msginp;
        $feedback->save();
        return redirect()->back()->with("feedbacksuccess","Thanks ! Your Feedback Has Submited");
    }

       // contact detalis
       public function contact_details()
       {
           $contact = user_contact::all();
           return view("PlantNest_Admin.fetchcontact",compact("contact"));
       }

// login users
       public function userfetch()
       {
           $fetchusers = user_registration::all();
           return view("PlantNest_Admin.userinfo", compact('fetchusers'));
       }


       public function checkout()
       {
           $checkout = checkout::all();
           return view("PlantNest_Admin.orders", compact('checkout'));
       }


       public function Feedback_fetch()
       {
           $feedback_fetch = feedback::all();
           return view("PlantNest_Admin.feedback_fetch", compact('feedback_fetch'));
       }


       public function reviews()
       {
           $reviews = review::all();
           return view("PlantNest_Admin.review", compact('reviews'));
       }

       
      
}
