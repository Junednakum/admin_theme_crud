<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('admin.auth_login');
    }  


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // set user id in session 
            $request->session()->put('loggedInUser', $user->id); //id

            return redirect('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function editprofile() {

        $user = Auth::user();

        return view('admin.Editprofile')->with('user', $user);
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function UpdateProfile(Request $request)
    {

        $request->validate([
            'crpassword' => 'required',
            'password' => 'required|same:confirmation_password',
            'confirmation_password' => 'required',
        ],[
            'crpassword.required'=> 'The current password field is required', // custom message
            'confirmation_password.required'=> 'The confirm password field is required', // custom message
            'password.required'=> 'The password field is required' // custom message
        ]);
         
        // The passwords matches
        if (!(Hash::check($request->crpassword, Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        // Current password and new password same
        if(strcmp($request->crpassword, $request->password) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }


        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $name =  $user->user_image;

        if($request->image != ""){
            $name = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->store('public/userimages');
        }

        $user->user_image = $name;
        //Change Password
       
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");



    }

}
