<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
Use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class User_Controller extends Controller
{
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
            $request->validate([
            'email'=>'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
             ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $user = User::find($id);
        $user->email = $request->input('email');
        $user->foreign_role_id = $request->input('role');
        $user->password = Hash::make($request ->password);
        $user->updated_by = $userId;
        $user->save();

        return back()->with('success', 'User updated successfully.');
    }

}

