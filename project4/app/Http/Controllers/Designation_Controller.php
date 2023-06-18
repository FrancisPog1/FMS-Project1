<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Designation;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Designation_Controller extends Controller
{
    /**Creating Designation */
    public function Create_Designation(Request $request){
        $request->validate([
            'title'=>'required|unique:designations',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $designation = new Designation();
        $designation->id = Str::uuid()->toString();
        $designation->title = $request ->title;
        $designation->description = $request ->description;  
        $res = $designation->save();
        if($res){
            return back()->with('success', 'You have created a Designation!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }

    public function deleteDesignations($id)
    {   // Find the designation by its ID
        $designation = Designation::find($id);

        // Check if the designation exists
        if ($designation) {
            // Delete the designation
            $designation->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Designation deleted successfully');
        }
        // If the designation doesn't exist, redirect with an error message
        return back()->with('error', 'Designation not found');
    }

    //UPDATE DESIGNATION
    public function updateDesignations(Request $request, $id)
    {
        $role = Designation::find($id);
        $role->title = $request->input('title');
        $role->description = $request->input('description');
        $role->save();

        return back()->with('success', 'Designation updated successfully.');
    }
}
 
