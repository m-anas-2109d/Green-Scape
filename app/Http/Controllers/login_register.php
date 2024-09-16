<?php

namespace App\Http\Controllers;

use App\Models\temp_verfy;
use App\Models\user_registration;
use DB;
use App\Models\add_to_cart;
use App\Models\checkout;
use App\Models\flowering_plantmodel;
use App\Models\user_contact;
use Illuminate\Support\Collection; // Import the Collection class
use App\Models\review;
use App\Models\wishlist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Mail;
// use hash;
class login_register extends Controller
{
    public function login()
    {
        $products = flowering_plantmodel::where('categories_id' , 'ct_64d7bc75e5e7b')->get();

        $randomProducts = Collection::make($products)->shuffle()->take(4);


        $products2 = flowering_plantmodel::where('categories_id' , 'ct_64d7bc82647fa')->get();

        $randomProductss = Collection::make($products2)->shuffle()->take(4);

        $products3 = flowering_plantmodel::where('categories_id' , 'ct_64d7bc75e5e7b')->get();

        $randomProductsss = Collection::make($products3)->shuffle()->take(4);

        $products4 = flowering_plantmodel::where('categories_id' , 'ct_64d7bc75e5e7b')->get();

        $randomProductssss = Collection::make($products4)->shuffle()->take(4);
        return view('Login_Register.login' ,compact('randomProducts','randomProductsss','randomProductss','randomProductssss'));
    }

    public function register()
    {
        return view('Login_Register.register');
    }

    // login post

        public function loginadminpost(Request $req)
    {
        $email = $req->emailinput;
        $password = $req->passwordinput;

        $login = DB::table("user_registrations")->where("email", $email)->first();

        if ($login && Hash::check($password, $login->password)) {
            // Password matches, proceed with login

            if (isset($email)) {
                $systemcheck = user_registration::where('email', $email)->first();

                if (!isset($systemcheck)) {
                    $systemcheck = new user_registration();
                    $systemcheck->email = $email;
                    $systemcheck->save();
                }
            }

            if ($login->role == "1") {
                session(["sessionid" => $login->id]);
                session(["sessionuseremail" => $login->email]);
                session(["sessionusername" => $login->first_name]);

                // Display SweetAlert for successful admin login
                return redirect("/admindashboard")->with('success', 'Successfully logged in!');
            } else if ($login->role == "0") {
                session(["sessionid" => $login->id]);
                session(["sessionuseremail" => $login->email]);
                session(["sessionusername" => $login->first_name]);

                $products = flowering_plantmodel::where('categories_id' , 'ct_64d7bc75e5e7b')->get();

                $randomProducts = Collection::make($products)->shuffle()->take(4);

                $products2 = flowering_plantmodel::where('categories_id' , 'ct_64d7bc82647fa')->get();

                $randomProductss = Collection::make($products2)->shuffle()->take(4);

                $products3 = flowering_plantmodel::where('categories_id' , 'ct_64d7bc75e5e7b')->get();

                $randomProductsss = Collection::make($products3)->shuffle()->take(4);

                $products4 = flowering_plantmodel::where('categories_id' , 'ct_64d7bc75e5e7b')->get();

                $randomProductssss = Collection::make($products4)->shuffle()->take(4);
                return redirect("/")->with('success', 'Successfully logged in!');

                // return view('PlantNest_USER.user_index' ,compact('randomProducts','randomProductsss','randomProductss','randomProductssss'))->with('success', 'Successfully logged in!');
            }
        } else {
            // Password doesn't match or user not found
            return redirect()->back()->with("errormessage", "Invalid credentials");
        }
    }
    

    // Register Post

    public function registerpost(Request $req)
    {
        $email = $req->emailinput;
        // $studcheck =DB::table("students")->where("student_email", $email)->first();
        $user = user_registration::where("email", $email)->first();

        $login = temp_verfy::where("email", session('sessionuseremail'))->first();
        // $login2 =DB::table("students")->where("Student_email", $email)->first();
        $pass = $req->passwordinput;
        $conpass = $req->coninput;

        if (strlen($pass) < 8) {
            echo "<script>alert('Woops! Password cannot be less the 8 characters.')
            window.location.href=''
            </script>";
            return;
        } else {
            if ($pass == $conpass) {
                session(["sessionuseremail" => $login->email]);
                session(["sessionusername" => $login->first_name]);
                session(["sessionid" => $user->id]);

                //forgot
                // if($login->status ==8)
                // {

                //     $user = user_registration::where("email", $email)->first();
                //     $user->password = $req->passwordinput;
                //     $user->update();
                // }
                // else
                // {
                // .....

                $user = user_registration::where("email", $email)->first();
                // echo $systemcheck;

                if (isset($user)) {
                    ;
                } else {
                    $logins = temp_verfy::where("email", $email)->first();

                    $user = new user_registration();
                    $user->first_name = $logins->first_name;
                    $user->last_name = $logins->last_name;
                    $user->email = $logins->email;
                    $user->contact_no = $logins->contact_no;

                    $user->password = $logins->passwordinput;
                    // $user->password = $req->password;
                    $user->role = 0;
                    $user->save();

                    // echo "Registerd";
                    $data = ['Std_Name' => $user->first_name, 'data' => $user->email];
                    $user['to'] = $user->email;

                    Mail::send('Login_Register.email_register', $data, function ($messages) use ($user) {
                        $messages->to($user['to']);
                        $messages->subject('User Registration Completed!');
                    });
                }

            }

            return redirect('/');
            // return view("/" ,compact( 'fetch','lab','hardware','software','Network','announcement','attendances','student_data'));

            // }
            // else
            // {
            //     echo
            //     "<script>alert('Password and Confirm password does not match.')
            //     window.location.href='/register'
            //     </script>";
            // }
        }

    }

    // Random code
    public function generateUniqueCode()
    {
        // $code = random_int(1000000, 999999);
        $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        return $code;
    }

    // code match
    public function code_match_(Request $req)
    {
        $email = $req->emailinput;
        $user = temp_verfy::where("email", $email)->first();

        $codes = $req->code0;
        $codes = $codes . $req->code1;
        $codes = $codes . $req->code2;
        $codes = $codes . $req->code3;
        $codes = $codes . $req->code4;
        $codes = $codes . $req->code5;

        //$studcheck =DB::table("students")->where("Student_email", $email)->first();
        //$req->emailinput;
        $user = user_registration::where("email", $email)->first();

        $login = temp_verfy::where("email", $email)->first();
        $logins = temp_verfy::where("email", $email)->first();

        $code_check = $req->code;
        $user = DB::table("temp_verfies")->where("email", $email)->first();
        // $login2 =DB::table("students")->where("Student_email", $email)->first();
        $pass = $req->passwordinput;
        $conpass = $req->coninput;

        if (isset($codes)) {
            session(["sessionuseremail" => $user->email]);
            session(["sessionusername" => $login->first_name]);
            session(["sessionid" => $login->id]);

            if ($codes == $login->code) {

                session(["sessionuseremail" => $login->email]);
                session(["sessionusername" => $login->first_name]);
                session(["sessionid" => $login->id]);

                $user = new user_registration();
                $user->first_name = $logins->first_name;
                $user->last_name = $logins->last_name;
                $user->email = $logins->email;
                $user->contact_no = $logins->contact_no;

                $user->password = $logins->password;
                $user->role = 0;

                $user->profile_image = $logins->profile_image;
                // $user->password = $req->password;
                $user->save();

                // echo "Registerd";
                $data = ['Std_Name' => $user->first_name, 'data' => $user->email];
                $user['to'] = $user->email;

                Mail::send('Login_Register.email_register', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('User Registration Completed!');
                });

                $fetch = temp_verfy::all();
                echo "<script>alert('Verfication Code Match.')
                window.location.href='/login'
                </script>";
            } else {
                echo "<script>alert('Wrong Verfication Code.')
                window.location.href='/code_match'
                </script>";
            }
        } else {
            echo "<script>alert('Please enter code and try again.')
            window.location.href='code_match'
            </script>";
        }

    }

    // get email
    public function get_email()
    {
        return view("Login_Register.code_match_");
    }

    // code match
    public function code_match(Request $res)
    {
        // $fetch = temp_verfy::where('email' ,session('sessionuseremail'));
        // echo "cfghj",  session('sessionusername');

        return view("Login_Register.code_match");
    }

    // code match

    public function input(Request $res)
    {
        // Taking input
        $get_Email = $res->emailinput;
    
        // Check if the email already exists in temp_verfy table
        $userverify = temp_verfy::where("email", $get_Email)->first();
    
        // Additional check for email existence
        $user = temp_verfy::where("email", $get_Email)->first();
        if (isset($user)) {
            echo "<script>alert('Email Already Exists.')
                window.location.href='/login'
                </script>";
        }

        elseif (isset($userverify)) {
            // If email exists, update the verification code
            $v_code = $this->generateUniqueCode();
            $userverify->code = $v_code;
            $userverify->update();
    
            try {
                $data = ['name' => $userverify->name, 'data' => $userverify->email, 'code' => $userverify->code];
                $user['to'] = $userverify->email;
                Mail::send('Login_Register.email_user', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('Registration Code for Plant Nest');
                });
    
                return redirect("/code_match");
    
            } catch (Exception $ex) {
                echo $ex->getMessage();
                die;
            }
        } else {
            // If email does not exist, insert a new record
            $password = $res->passwordinput;
    
            $studcheck = new temp_verfy();
            $studcheck->email = $get_Email;
            $studcheck->first_name = $res->first_name;
            $studcheck->last_name = $res->last_name;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $studcheck->password = $hashedPassword;
            $studcheck->contact_no = $res->contact;
            $studcheck->code = $this->generateUniqueCode();
            $studcheck->save();

            


            if ($res->hasFile('image')) {
                $image = $res->file('image');
                $ext = rand() . "." . $image->getClientOriginalName();
                $image->move('images/', $ext);
                $studcheck->profile_image = $ext;
                $studcheck->save(); // Save the updated company image
            }
    
    
            try {
                $data = ['name' => $studcheck->name, 'data' => $studcheck->email, 'code' => $studcheck->code];
                $user['to'] = $studcheck->email;
                Mail::send('Login_Register.email_user', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('Registration Code for Plant Nest');
                });
    
                session(['sessionuseremail' => $get_Email]);

                return redirect("/code_match");
    
            } catch (Exception $ex) {
                echo $ex->getMessage();
                die;
            }
        }
    
        
    }
    

    // logout

    public function logout()
    {
        session()->forget("sessionuseremail");
        return redirect("/");
    }

    // forget password 

    public function forgetpassword()
    {
        $fetch = temp_verfy::all();
        return view("Login_Register.forgetpassword",compact('fetch'));
    }

    public function forgetpassword_(Request $req)
    {
        $v_code =  $this->generateUniqueCode();
        $user = user_registration::where('email',$req->emailinput)->first();
        
       if(isset($req->emailinput))
       {
           if(isset($user))
           {
            $fetch = temp_verfy::all();

                 $data= ['data'=> $user->email , 'code'=>$v_code]; 
                //$data= Auth::User()->name;
                $user ['to'] = $user->email;    
                Mail::send('Login_Register.email_user_forg',$data ,function($messages) use ($user)
                {
                    $messages->to($user ['to']);
                    $messages->subject('Forgot Passwword Code for Online Varsity');
                });
                $fuser = temp_verfy::where('email',$req->emailinput)->first();
                $fuser->code = $v_code; 
                $fuser->status = 8;  
                $fuser->update();
                return view("Login_Register.code_match",compact('fetch'));
            }else{
                echo "<script>alert('Invalid Email Address.')
                window.location.href='/forgetpassword'
                </script>";
            }
       }
       else{
        echo "<script>alert('Please Provide Email Addresss to Continue.')
            </script>";

       }
        
    }

    // new forgt password work

    public function showResetEmailForm()
    {
        
        return view('auth.passwords.reset_email');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $user = user_registration::where('email', $request->email)->first();
    
        if (!$user) {
            // return redirect('/password/reset/email')->with('error', 'User not found.');
            echo "<script>alert('User not found.')
            window.location.href='/password/reset/email'
            </script>";
        }
    
        // Generate a random 6-digit code
        $code = $v_code = $this->generateUniqueCode();
    
        // Update only the 'code' column in the temp_verifies table
        temp_verfy::where('email', $request->email)->update(['code' => $code]);
    
        // Store the email in the session
        session(['sessionuseremail' => $request->email]);
    
        // Display JavaScript alert
        echo "<script>alert('Code sent successfully. Check your email for the verification code.')
                window.location.href='/password/reset/code'
                </script>";
    
        // Additional logic to send the code via email (you may use Laravel's Mail or any other email service)
        $data = ['code' => $code];
        $user['to'] = $user->email;
        Mail::send('PlantNest_USER.email_user_forg', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Forgot Password Code for Plant Nest');
        });
    }
    

        public function showResetCodeForm(Request $request)
        {
            // Retrieve the email from the TempVerify model based on the code
            $email = temp_verfy::where('email', session('sessionuseremail'))->first();
        
            return view('auth.passwords.reset_code',compact('email'));
        }
        

        public function resetPassword(Request $request)
        {
            $request->validate([
                    'code' => 'required',
                'password' => 'required|confirmed|min:8',
            ]);

            $tempVerify = temp_verfy::where('email', $request->email)->where('code', $request->code)->first();

            if (!$tempVerify) {
                // return redirect('/password/reset/code')->with('error', 'Invalid code.');
                echo "<script>alert('Invalid code.')
                window.location.href='/password/reset/code'
                </script>";
            }

            // Update password in the users table
            $user = user_registration::where('email', $request->email)->first();

            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();
            }

            // Clear the code from the temp_verifies table
            // $tempVerify->delete();

            echo "<script>alert('Password reset successfully. You can now log in with your new password.')
                window.location.href='/login'
                </script>";
            // return redirect('/login')->with('status', 'Password reset successfully. You can now log in with your new password.');
        }

}