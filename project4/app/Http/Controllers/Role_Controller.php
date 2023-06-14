<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\Role;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Role_Controller extends Controller
{
    //Creating a Role
    public function Create_Roles(Request $request){
        $request->validate([
            'title'=>'required|unique:roles',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $role = new Role();
        $role->id = Str::uuid()->toString();
        $role->title = $request ->title;
        $role->description = $request ->description;  
        $res = $role->save();
        if($res){
            return back()->with('success', 'You have created a Role!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }


    //Deleting Role
    public function deleteRoles($id)
    {   // Find the role by its ID
        $role = Role::find($id);

        // Check if the role exists
        if ($role) {
            // Delete the role
            $role->delete();
            // Redirect to a success page or perform any other actions
            // You can customize thrankis based on your requirements
            return back()->with('success', 'Role deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Role not found');
    }

        //UPDATE ROLES
        public function updateRoles(Request $request, $id)
        {
            $role = Role::find($id);
            $role->title = $request->input('title');
            $role->description = $request->input('description');
            $role->save();
    
            return back()->with('success', 'Role updated successfully.');
        }

}
 
