<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\RequirementBinContent;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class RequirementSetup_Controller extends Controller
{

    public function show($bin_id){
        $requirementtypes = DB::table('requirement_types')->get();
        $requirements = DB::table('requirement_bin_contents')
        ->join('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
                ->select('requirement_types.title as title', 'requirement_bin_contents.notes as notes',
                'requirement_bin_contents.file_format as file_format')
        ->get();
        return view('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup', compact('requirementtypes', 'bin_id', 'requirements'));
    }


/**Codes for Creating Academic Rank */
    public function Create_Requirement(Request $request, $bin_id){
        /**Codes to validate the input fields of the registration page */

        $request->validate([
            'type'=>'required',
            'notes'=>'max:300'
        ]);

        // Get the ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $bin_setup = new RequirementBinContent();
        $bin_setup->id = Str::uuid()->toString();
        $bin_setup->foreign_requirement_types_id = $request->type;
        $bin_setup->foreign_requirement_bins_id = $bin_id;
        $bin_setup->notes = $request ->notes;
        $bin_setup->created_by =  $userId;
        $res = $bin_setup->save();

        if($res){
            return back()->with('success', 'You have Added Requirement!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }
    }
    //DELETE RANKS
    public function deleteRanks($id)
    {   // Find the role by its ID

    }

    //UPDATE RANKS
    public function updateRanks(Request $request, $id)
    {
    }



}

