<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Login_Controller extends Controller
{
    public function login(){
        return view("auth.login");

    }
    
/**Codes for login form */
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|',
            'Password'=>'required|min:8|max:20'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user) {
            if(Hash::check($request->Password, $user->password)){
                $request->Session()->put('loginId', $user->id);
                return redirect('AcadHead_Dashboard')->with('success', 'Login Successfull');
            }
            else{
                return back()->with('error', 'Password Not Matches');
            }

        }
        else{
            return back()->with('error', 'The email is not registered');
        }

    }



}
 
