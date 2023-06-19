<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\FacultyType;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class FacultyType_Controller extends Controller
{


    /**Creating Faculty Type */
    public function Create_FacultyType(Request $request){
        $request->validate([
            'title'=>'required|unique:faculty_types',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $faculty_type = new facultyType();
        $faculty_type->id = Str::uuid()->toString();
        $faculty_type->title = $request ->title;
        $faculty_type->description = $request ->description;
        $faculty_type->created_by = $userId;

        $res = $faculty_type->save();
        if($res){
            return back()->with('success', 'You have created a Faculty Type!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }

    public function deleteFacultytypes($id)
    {   // Find the Faculty Type by its ID
        $type = facultyType::find($id);

        // Check if the Faculty Type exists
        if ($type) {
            // Delete the Faculty Type
            $type->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Faculty Type deleted successfully');
        }
        // If the Faculty Type doesn't exist, redirect with an error message
        return back()->with('error', 'Faculty Type not found');
    }

    //UPDATE Faculty Types
    public function updateFacultytypes(Request $request, $id)
    {
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $type = facultyType::find($id);
        $type->title = $request->input('title');
        $type->description = $request->input('description');
        $type->updated_by = $userId;

        $type->save();

        return back()->with('success', 'Faculty Type updated successfully.');
    }


}

