<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\RequirementType;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class RequirementType_Controller extends Controller
{

    /**Creating Requirement Type */
    public function Create_RequirementType(Request $request){
        $request->validate([
            'title'=>'required|unique:requirement_types',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $reqtype = new RequirementType();
        $reqtype->id = Str::uuid()->toString();
        $reqtype->title = $request ->title;
        $reqtype->description = $request ->description;
        $reqtype->created_by = $userId;

        $res = $reqtype->save();
        if($res){
            return back()->with('success', 'You have created a Requirement Type'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }
    }

    public function deleteRequirementtypes($id)
    {   // Find the requirement type by its ID
        $reqtype = RequirementType::find($id);

        // Check if the requirement type exists
        if ($reqtype) {
            // Delete the requirement type
            $reqtype->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Requirement Type deleted successfully');
        }
        // If the requirement type doesn't exist, redirect with an error message
        return back()->with('error', 'Requirement Type not found');
    }

    //UPDATE REQUIREMENT TYPE
    public function updateRequirementtypes(Request $request, $id)
    {

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $req_type = RequirementType::find($id);
        $req_type->title = $request->input('title');
        $req_type->description = $request->input('description');
        $req_type->updated_by = $userId;

        $req_type->save();

        return back()->with('success', 'Requirement Type updated successfully.');
    }

}

