<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Activities;
Use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Activities_Controller extends Controller
{
           /**Creating Activity */
           public function Create_Activities(Request $request){
            $request->validate([
                'title' => 'required|unique:activities',
                'description' => 'max:1000',
                'location' => 'max:400',
                'start_datetime' => 'required|date|after_or_equal:today',
                'end_datetime' => 'required|date|after_or_equal:today',
                'type' => 'required',
                'status' => 'nullable'
            ]);

            // Get the User ID of the logged in user
            $userId = Auth::user()->id;

            /**Codes to get the contents of the input field and save it to the database */
            $activities = new Activities();
            $activities->id = Str::uuid()->toString();
            $activities->title = $request ->title;
            $activities->description = $request ->description;
            $activities->location = $request ->location;
            $activities->activity_type_id = $request ->type;

            //This codes converts the date picker format into datetime format
            $start_datetime = trim($request->input('start_datetime'));
            $start_carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $start_datetime);
            $formatted_startDate = $start_carbonDate->format('Y-m-d H:i:s');
            $activities->start_datetime = $formatted_startDate;

            $end_datetime = trim($request->input('end_datetime'));
            $end_carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $end_datetime);
            $formatted_endDate = $end_carbonDate->format('Y-m-d H:i:s');
            $activities->end_datetime = $formatted_endDate;

            $activities->status = $request ->status;
            $activities->created_by = $userId;

            $res = $activities->save();
            if($res){
                return back()->with('success', 'You have created a Activity!'); /**Alert Message */
            }
            else{
                return back()->with('fail', 'Something went Wrong');
            }

        }



}

