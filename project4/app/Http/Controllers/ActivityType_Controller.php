<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;



use App\Models\ActivityType;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class ActivityType_Controller extends Controller
{
    /**Creating Activity Type */
    public function Create_ActivityType(Request $request){
        $request->validate([
            'title'=>'required|unique:requirement_types',
            'category'=>'required',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $act_type = new ActivityType();
        $act_type->id = Str::uuid()->toString();
        $act_type->title = $request ->title;
        $act_type->description = $request ->description;
        $act_type->category = $request ->category;
        $act_type->created_by = $userId;

        $res = $act_type->save();
        if($res){
            return back()->with('success', 'You have created a Activity Type'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }
    }

    public function deleteActivitytypes($id)
    {   // Find the Activity Type by its ID
        $act_type = ActivityType::find($id);

        // Check if the Activity Type exists
        if ($act_type) {
            // Delete the Activity Type
            $act_type->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Activity Type deleted successfully');
        }
        // If the Activity Type doesn't exist, redirect with an error message
        return back()->with('error', 'Activity Type not found');
    }

    //UPDATE ACTIVITY TYPES
    public function updateActivitytypes(Request $request, $id)
    {
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $act_type = ActivityType::find($id);
        $act_type->title = $request->input('title');
        $act_type->description = $request->input('description');
        $act_type->category = $request ->input('category');
        $act_type->updated_by = $userId;

        $act_type->save();

        return back()->with('success', 'Activity Type updated successfully.');
    }

}

