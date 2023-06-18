<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\AcademicRank;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class AcademicRank_Controller extends Controller
{
/**Codes for Creating Academic Rank */
    public function Create_AcadRank(Request $request){
        /**Codes to validate the input fields of the registration page */
        $request->validate([
            'title'=>'required|unique:academic_ranks',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $AcadRank = new AcademicRank();
        $AcadRank->id = Str::uuid()->toString();
        $AcadRank->title = $request ->title;
        $AcadRank->description = $request ->description;  
        $res = $AcadRank->save();
        if($res){
            return back()->with('success', 'You have created an Academic Rank!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }
    }
    //DELETE RANKS
    public function deleteRanks($id)
    {   // Find the role by its ID
        $rank = AcademicRank::find($id);

        // Check if the role exists
        if ($rank) {
            // Delete the role
            $rank->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Rank deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Rank not found');
    }

    //UPDATE RANKS
    public function updateRanks(Request $request, $id)
    {

        $user_id = Auth::user()->id;
        $acadrank = AcademicRank::find($id);
        $acadrank->title = $request->input('title');
        $acadrank->description = $request->input('description');
            // Assign the user's ID to the user_id foreign key column
        // $acadrank->updated_by = $user->id;
        $acadrank->save();
        
        echo $user_id;
        // return back()->with('success', 'Academic rank updated successfully.');
    }


}
 
