<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
Use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class User_Controller extends Controller
{
    
/**Codes for registration */
    public function registerUser(Request $request){
        /**Codes to validate the input fields of the registration page */
        $request->validate([
            'email'=>'required|email|unique:users',
            'Password'=>'required|min:8|max:20',
            'ConfirmPassword'=>'required|min:8|max:20|same:Password'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $user = new User();
        $user->id = Str::uuid()->toString();
        $user->email = $request ->email;
        $user->Password = Hash::make($request ->Password);  
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have created an account!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something Wrong');
        }
    }

    public function deleteUsers($id)
    {   // Find the user by its ID
        $user = User::find($id);

        // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'User deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'User not found');
    }

    //UPDATE USER
    public function updateUsers(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->input('email');
        $user->save();

        return back()->with('success', 'User updated successfully.');
    }

}
 
