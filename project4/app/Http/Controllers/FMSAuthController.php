<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AcademicRank;
use App\Models\Designation;
use App\Models\Specialization;
use App\Models\Program;
use App\Models\FacultyType;
use App\Models\Role;
use App\Models\RequirementBin;
use App\Models\RequirementType;
use App\Models\ActivityType;
Use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class FMSAuthController extends Controller
{
    public function login(){
        return view("auth.login");

    }
    
/**Codes for registration */
    public function registerUser(Request $request){
        /**Codes to validate the input fields of the registration page */
        $request->validate([
            'email'=>'required|email|unique:users',
            'Password'=>'required|min:8|max:20',
            'ConfirmPassword'=>'required|min:8|max:20|same:Password'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $user = new User();
        $user->id = Str::uuid()->toString();
        $user->email = $request ->email;
        $user->Password = Hash::make($request ->Password);  
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have created an account!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something Wrong');
        }
    }

    public function deleteUsers($id)
    {   // Find the user by its ID
        $user = User::find($id);

        // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'User deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'User not found');
    }

    //UPDATE USER
    public function updateUsers(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->input('email');
        $user->save();

        return back()->with('success', 'User updated successfully.');
    }


/**Codes for login form */
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|',
            'Password'=>'required|min:8|max:20'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user) {
            if(Hash::check($request->Password, $user->password)){
                $request->Session()->put('loginId', $user->id);
                return redirect('AcadHead_Dashboard')->with('success', 'Login Successfull');
            }
            else{
                return back()->with('error', 'Password Not Matches');
            }

        }
        else{
            return back()->with('error', 'The email is not registered');
        }

    }

    /**Academic Head Dashboard */

    public function dashboard(){
        return view("Academic_head.AcadHead_Dashboard.INTG_AcadHead_Dashboard");
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect("/");
        }
        else{
            echo "Hindi pumasok";
        }
    }


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
        $acadrank = AcademicRank::find($id);
        $acadrank->title = $request->input('title');
        $acadrank->description = $request->input('description');
        $acadrank->save();

        return back()->with('success', 'Academic rank updated successfully.');
    }

    /**Creating Specialization */
    public function Create_Specialization(Request $request){
        $request->validate([
            'title'=>'required|unique:specializations',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $specialization = new Specialization();
        $specialization->id = Str::uuid()->toString();
        $specialization->title = $request ->title;
        $specialization->description = $request ->description;  
        $res = $specialization->save();
        if($res){
            return back()->with('success', 'You have created an Academic Rank!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }

    public function deleteSpecializations($id)
    {   // Find the specialization by its ID
        $specialization = Specialization::find($id);

        // Check if the specialization exists
        if ($specialization) {
            // Delete the specialization
            $specialization->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Specialization deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Specialization not found');
    }

    //UPDATE SPECIALIZATION
    public function updateSpecializations(Request $request, $id)
    {
        $specialization = Specialization::find($id);
        $specialization->title = $request->input('title');
        $specialization->description = $request->input('description');
        $specialization->save();

        return back()->with('success', 'Specialization updated successfully.');
    }

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
            return back()->with('success', 'You have created an Academic Rank!'); /**Alert Message */
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



    /**Creating Faculty Type */
    public function Create_FacultyType(Request $request){
        $request->validate([
            'title'=>'required|unique:faculty_types',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $faculty_type = new facultyType();
        $faculty_type->id = Str::uuid()->toString();
        $faculty_type->title = $request ->title;
        $faculty_type->description = $request ->description;  
        $res = $faculty_type->save();
        if($res){
            return back()->with('success', 'You have created an Academic Rank!'); /**Alert Message */
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
        $type = facultyType::find($id);
        $type->title = $request->input('title');
        $type->description = $request->input('description');
        $type->save();

        return back()->with('success', 'Faculty Type updated successfully.');
    }


    /**Creating  Program*/
    public function Create_Program(Request $request){
        $request->validate([
            'title'=>'required|unique:programs',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $program = new Program();
        $program->id = Str::uuid()->toString();
        $program->title = $request ->title;
        $program->description = $request ->description;  
        $res = $program->save();
        if($res){
            return back()->with('success', 'You have created an Academic Rank!'); /**Alert Message */
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
        $program = Program::find($id);
        $program->title = $request->input('title');
        $program->description = $request->input('description');
        $program->save();

        return back()->with('success', 'Program updated successfully.');
    }


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
            return back()->with('success', 'You have created an Academic Rank!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }

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


        /**Creating Requirement Bin */
        public function Create_RequirementBin(Request $request){
            $request->validate([
                'title' => 'required|unique:requirement_bins',
                'description' => 'max:300',
                'deadline' => 'required|date|after_or_equal:today',
                'status' => 'nullable'
            ]);
    
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
            $req_bin = RequirementBin::find($id);
            $req_bin->title = $request->input('title');
            $req_bin->description = $request->input('description');

            //This codes converts the date picker format into datetime format
            $deadline = trim($request->input('deadline'));
            $carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $deadline);
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $req_bin->deadline = $formattedDate;
            $req_bin->status = $request ->input('status');

            $req_bin->save();

            return back()->with('success', 'Requirement Type updated successfully.');
        }

        
    /**Creating Requirement Type */
    public function Create_RequirementType(Request $request){
        $request->validate([
            'title'=>'required|unique:requirement_types',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $reqtype = new RequirementType();
        $reqtype->id = Str::uuid()->toString();
        $reqtype->title = $request ->title;
        $reqtype->description = $request ->description;  
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
        $req_type = RequirementType::find($id);
        $req_type->title = $request->input('title');
        $req_type->description = $request->input('description');
        $req_type->save();

        return back()->with('success', 'Requirement Type updated successfully.');
    }



    /**Creating Activity Type */
    public function Create_ActivityType(Request $request){
        $request->validate([
            'title'=>'required|unique:requirement_types',
            'category'=>'required',
            'description'=>'max:300'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $act_type = new ActivityType();
        $act_type->id = Str::uuid()->toString();
        $act_type->title = $request ->title;
        $act_type->description = $request ->description;
        $act_type->category = $request ->category;  
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
        $act_type = ActivityType::find($id);
        $act_type->title = $request->input('title');
        $act_type->description = $request->input('description');
        $act_type->category = $request ->input('category'); 
        $act_type->save();

        return back()->with('success', 'Activity Type updated successfully.');
    }


           /**Creating Activity */
           public function Create_Activities(Request $request){
            $request->validate([
                'title' => 'required|unique:requirement_bins',
                'description' => 'max:300',
                'deadline' => 'required|date|after_or_equal:today',
                'status' => 'nullable'
            ]);
    
            /**Codes to get the contents of the input field and save it to the database */
            $reqbin = new RequirementBin();
            $reqbin->id = Str::uuid()->toString();
            $reqbin->title = $request ->title;
            $reqbin->description = $request ->description;  

            //This codes converts the date picker format into datetime format
            $deadline = trim($request->input('deadline'));
            $carbonDate = Carbon::createFromFormat('Y-m-d H:i A', $request->input('deadline'));
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $reqbin->deadline = $formattedDate;

            $reqbin->status = $request ->status;  
            $res = $reqbin->save();
            if($res){
                return back()->with('success', 'You have created a Requirement Bin!'); /**Alert Message */
            }
            else{
                return back()->with('fail', 'Something went Wrong');
            }
    
        }


}
 
