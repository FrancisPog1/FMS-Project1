<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\Program;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class Program_Controller extends Controller
{
    /**Creating  Program*/
    public function Create_Program(Request $request){
        $request->validate([
            'title'=>'required|unique:programs',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $program = new Program();
        $program->id = Str::uuid()->toString();
        $program->title = $request ->title;
        $program->description = $request ->description;
        $program->created_by = $userId;

        $res = $program->save();
        if($res){
            return back()->with('success', 'You have created a Program!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }

    public function deletePrograms($id)
    {   // Find the program by its ID
        $program = Program::find($id);

        // Check if the program exists
        if ($program) {
            // Delete the program
            $program->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Rank deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Rank not found');
    }

    //UPDATE PROGRAMS
    public function updatePrograms(Request $request, $id)
    {
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $program = Program::find($id);
        $program->title = $request->input('title');
        $program->description = $request->input('description');
        $program->title = $request->input('title');
        $program->updated_by = $userId;

        $program->save();

        return back()->with('success', 'Program updated successfully.');
    }


}

