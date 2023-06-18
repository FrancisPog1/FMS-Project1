<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\RequirementBin;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class RequirementBin_Controller extends Controller
{

        /**Creating Requirement Bin */
        public function Create_RequirementBin(Request $request){
            $request->validate([
                'title' => 'required|unique:requirement_bins',
                'description' => 'max:300',
                'deadline' => 'required|date|after_or_equal:today',
                'status' => 'nullable'
            ]);
            // Get the ID of the logged in user
            $userId = Auth::user()->id;

            /**Codes to get the contents of the input field and save it to the database */
            $reqbin = new RequirementBin();
            $reqbin->id = Str::uuid()->toString();
            $reqbin->title = $request ->title;
            $reqbin->description = $request ->description;

            //This codes converts the date picker format into datetime format
            $deadline = trim($request->input('deadline'));
            $carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $deadline);
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $reqbin->deadline = $formattedDate;

            $reqbin->status = $request ->status;
            $reqbin->created_by =  $userId;

            $res = $reqbin->save();
            if($res){
                return back()->with('success', 'You have created a Requirement Bin!'); /**Alert Message */
            }
            else{
                return back()->with('fail', 'Something went Wrong');
            }

        }
        //Delete Requirement Bin
        public function deleteRequirementBins($id)
        {   // Find the requirement bin by its ID
            $reqbin = RequirementBin::find($id);

            // Check if the requirement bin exists
            if ($reqbin) {
                // Delete the requirement bin
                $reqbin->delete();
                // Redirect to a success page or perform any other actions
                // You can customize this based on your requirements
                return back()->with('success', 'Requirement Bin deleted successfully');
            }
            // If the requirement type doesn't exist, redirect with an error message
            return back()->with('error', 'Requirement Bin not found');
        }


        //UPDATE REQUIREMENT BIN
        public function updateRequirementbins(Request $request, $id)
        {
            // Get the ID of the logged in user
            $userId = Auth::user()->id;

            $req_bin = RequirementBin::find($id);
            $req_bin->title = $request->input('title');
            $req_bin->description = $request->input('description');

            //This codes converts the date picker format into datetime format
            $deadline = trim($request->input('deadline'));
            $carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $deadline);
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $req_bin->deadline = $formattedDate;
            $req_bin->status = $request ->input('status');
            $req_bin->updated_by =  $userId;


            $req_bin->save();

            return back()->with('success', 'Requirement Type updated successfully.');
        }

}

