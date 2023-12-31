<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcademicRank_Controller;
use App\Http\Controllers\Specialization_Controller;
use App\Http\Controllers\Designation_Controller;
use App\Http\Controllers\FacultyType_Controller;
use App\Http\Controllers\Program_Controller;
use App\Http\Controllers\Role_Controller;
use App\Http\Controllers\RequirementBin_Controller;
use App\Http\Controllers\RequirementType_Controller;
use App\Http\Controllers\ActivityType_Controller;
use App\Http\Controllers\Activities_Controller;
use App\Http\Controllers\User_Controller;   // For update and delete
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RequirementSetup_Controller;

use App\Http\Controllers\Dashboard_Controller;

use Carbon\Carbon;
use App\Http\Middleware\AuthCheck;

use App\Http\Controllers\DropzoneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//------------------------------------------------------------------ ACADEMIC HEAD --------------------------------------------------------------------//
// Route::middleware(['auth','isAdmin'])->group(function () {
Route::middleware(['auth','isAdmin'])->group(function () {
     // Define your protected routes here
     //This protects the page by prohibiting the access of user when they are not logged in

    /**Academic Head Dashboard */
    Route::get('/AcadHead_Dashboard', function () {
        return view('Academic_head/INTG_AcadHead_Dashboard', ['page_title' => 'Dashboard']);
        })->name('acadhead_Dashboard');

    /**Add User */
    Route::get('/AddUser', function () {
        $roles = DB::table('roles')->get();

        $users = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->select('roles.title as user_role', 'users.email', 'users.status', 'users.id')
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_AddUser', compact('users','roles'));
    })->name('acadhead_AddUser');


    /**Academic Rank */
    Route::get('/AcadHead', function () {
        $acadranks = DB::table('academic_ranks')->get();
        return view('Academic_head/Admin_Setup/AcadHead_AcademicRank', compact('acadranks'));
    })->name('acadhead_AcademicRank');

    /**Role */
    Route::get('/Role', function () {
        $roles = DB::table('roles')->get();
        return view('Academic_head/Admin_Setup/AcadHead_Role', compact('roles'));
    })->name('acadhead_UserRole');


    /**Faculty Type */
    Route::get('/FacultyType', function () {
        $facultytypes = DB::table('faculty_types')->get();
        return view('Academic_head/Admin_Setup/AcadHead_FacultyType', compact('facultytypes'));
    })->name('acadhead_FacultyType');

    /**Designation */
    Route::get('/Designation', function () {
        $designations = DB::table('designations')->get();
        return view('Academic_head/Admin_Setup/AcadHead_Designation', compact('designations'));
    })->name('acadhead_Designation');


    /**Specialization */
    Route::get('/Specialization', function () {
        $specializations = DB::table('specializations')->get();
        return view('Academic_head/Admin_Setup/AcadHead_Specialization', compact('specializations'));
    })->name('acadhead_Specialization');


        /**Program*/
        Route::get('/Program', function () {
            $programs = DB::table('programs')->get();
            return view('Academic_head/Admin_Setup/AcadHead_Programs', compact('programs'));
        })->name('acadhead_Program');


        /**Requirement Bin*/
        Route::get('/RequirementBin', function () {
            $requirementbins = DB::table('requirement_bins')->get();
            //Format the deadline or date into more readable date format
            foreach ($requirementbins as $requirementbin) {
                $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
            }
            return view('Academic_head/AcadHead_Setup/AcadHead_RequirementBin', compact('requirementbins'));
        })->name('acadhead_RequirementBin');


        /**Requirement Type*/
        Route::get('/RequirementType', function () {
            $requirementtypes = DB::table('requirement_types')->get();
            return view('Academic_head/AcadHead_Setup/AcadHead_RequirementType', compact('requirementtypes'));
        })->name('acadhead_RequirementType');

        /**Activity Type*/
        Route::get('/ActivityType', function () {
            $activitytypes = DB::table('activity_types')->get();
            return view('Academic_head/AcadHead_Setup/AcadHead_ActivityType', compact('activitytypes'));
        })->name('acadhead_ActivityType');

        /**Class Schedule*/
        Route::get('/ClassSchedule', function () {
            return view('Academic_head/AcadHead_Setup/AcadHead_ClassSchedule', ['page_title' => 'Class Schedule']);
            })->name('acadhead_ClassSchedule');


        /**Class Observation*/
        Route::get('/ClassObservation', function () {
            return view('Academic_head/AcadHead_Setup/AcadHead_ClassObservation', ['page_title' => 'Class Observation']);
            })->name('acadhead_ClassObservation');


        /**Academic Head Reports*/
        Route::get('/Reports', function () {
            return view('Academic_head/AcadHead_Setup/AcadHead_Reports', ['page_title' => 'Reports']);
            })->name('acadhead_Reports');


        /**Academic Head Activities*/

        Route::get('/AcadHead_Activities', function () {
            $activitytypes = DB::table('activity_types')->get();

            $activities = DB::table('activities')
                ->join('activity_types', 'activities.activity_type_id', '=', 'activity_types.id')
                ->select('activities.title', 'activities.start_datetime', 'activities.status', 'activities.end_datetime',
                'activity_types.title as type_title', 'activities.description', 'activities.location', 'activities.id',
                'activity_types.id as type')
                ->get();

            // Convert start_datetime and end_datetime to the desired format
            foreach ($activities as $activity) {
                $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
                $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
            }

            return view('Academic_head/AcadHead_Setup/AcadHead_Activities', compact('activities', 'activitytypes'));

        });


        /**User Profiles*/
        Route::get('/UserProfile', function () {
            return view('/User_Profile', ['page_title' => 'User Profile']);
            })->name('user_Profile');

    //This is all the routes for Creating or Adding.
    Route::post('/Create_AcademicRank', [AcademicRank_Controller::class, 'Create_AcadRank'])->name('Create_AcademicRank');
    Route::post('/CreateProgram', [Program_Controller::class, 'Create_Program'])->name('CreateProgram');
    Route::post('/CreateSpecialization', [Specialization_Controller::class, 'Create_Specialization'])->name('CreateSpecialization');
    Route::post('/CreateDesignation', [Designation_Controller::class, 'Create_Designation'])->name('CreateDesignation');
    Route::post('/CreateFacultyType', [FacultyType_Controller::class, 'Create_FacultyType'])->name('CreateFacultyType');
    Route::post('/CreateRole', [Role_Controller::class, 'Create_Roles'])->name('CreateRole');
    // Route::post('/register_user', [User_Controller::class, 'registerUser'])->name('register_user');
    Route::post('/Create_RequirementBin', [RequirementBin_Controller::class, 'Create_RequirementBin'])->name('Create_RequirementBin');
    Route::post('/Create_RequirementType', [RequirementType_Controller::class, 'Create_RequirementType'])->name('Create_RequirementType');
    Route::post('/Create_ActivityType', [ActivityType_Controller::class, 'Create_ActivityType'])->name('Create_ActivityType');
    Route::post('/Create_Activities', [Activities_Controller::class, 'Create_Activities'])->name('Create_Activities');
    Route::post('/Setup_RequirementBin/{id}', [RequirementSetup_Controller::class, 'Create_Requirement'])->name('Setup_RequirementBin');

    //Delete routes for deleting records
    Route::delete('/delete_roles/{roleId}', [Role_Controller::class, 'deleteRoles'])->name('delete_roles');
    Route::delete('/delete_ranks/{rankId}', [AcademicRank_Controller::class, 'deleteRanks'])->name('delete_ranks');
    Route::delete('/delete_users/{userId}', [User_Controller::class, 'deleteUsers'])->name('delete_users');
    Route::delete('/delete_designations/{designationId}', [Designation_Controller::class, 'deleteDesignations'])->name('delete_designations');
    Route::delete('/delete_facultytypes/{facultytypeId}', [FacultyType_Controller::class, 'deleteFacultytypes'])->name('delete_facultytypes');
    Route::delete('/delete_programs/{programId}', [Program_Controller::class, 'deletePrograms'])->name('delete_programs');
    Route::delete('/delete_specializations/{specializationId}', [Specialization_Controller::class, 'deleteSpecializations'])->name('delete_specializations');
    Route::delete('/delete_requirementtypes/{requirementtypeId}', [RequirementType_Controller::class, 'deleteRequirementtypes'])->name('delete_requirementtypes');
    Route::delete('/delete_requirementbins/{requirementbinId}', [RequirementBin_Controller::class, 'deleteRequirementBins'])->name('delete_requirementbins');
    Route::delete('/delete_activitytypes/{activitytypeId}', [ActivityType_Controller::class, 'deleteActivitytypes'])->name('delete_activitytypes');
    Route::delete('/delete_activities/{activitiesId}', [Activities_Controller::class, 'deleteActivities'])->name('delete_activities');

    //Route for updating records
    Route::put('/update_ranks{id}', [AcademicRank_Controller::class, 'updateRanks'])->name('update_ranks');
    Route::put('/update_roles{roleId}', [Role_Controller::class, 'updateRoles'])->name('update_roles');
    Route::put('/update_users{userId}', [User_Controller::class, 'updateUsers'])->name('update_users');
    Route::put('/update_designations{designationId}', [Designation_Controller::class, 'updateDesignations'])->name('update_designations');
    Route::put('/update_facultytypes{facultytypeId}', [FacultyType_Controller::class, 'updateFacultytypes'])->name('update_facultytypes');
    Route::put('/update_programs{programId}', [Program_Controller::class, 'updatePrograms'])->name('update_programs');
    Route::put('/update_specializations{specializationId}', [Specialization_Controller::class, 'updateSpecializations'])->name('update_specializations');
    Route::put('/update_requirementtypes{requirementtypeId}', [RequirementType_Controller::class, 'updateRequirementtypes'])->name('update_requirementtypes');
    Route::put('/update_requirementbins{requirementbinId}', [RequirementBin_Controller::class, 'updateRequirementbins'])->name('update_requirementbins');
    Route::put('/update_activitytypes{activitytypeId}', [ActivityType_Controller::class, 'updateActivitytypes'])->name('update_activitytypes');
    Route::put('/update_activities{activitiesId}', [Activities_Controller::class, 'updateActivities'])->name('update_activities');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // For registering users
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register_user', [RegisteredUserController::class, 'Create_User'])->name('register_user');



    //Newly Added Routes
    //Requirement Bin Setup Page
    Route::get('/requirementbin_setup_page{id}', [RequirementSetup_Controller::class, 'show'])->name('acadhead_bin_setup');
});



//------------------------------------------------------------------ FACULTIES --------------------------------------------------------------------//
Route::middleware(['auth', 'isFaculty'])->group(function () {

Route::get('/FacultyActivities', function () {
    return view('Faculty/Faculty_Activities', ['page_title' => 'Faculty Activities']);
    })->name('faculty_Activities');

Route::get('/FacultyClassObservation', function () {
    return view('Faculty/Faculty_ClassObservation', ['page_title' => 'Faculty Class Observation']);
    })->name('faculty_ClassObservation');

Route::get('/FacultyClassSchedule', function () {
    return view('Faculty/Faculty_ClassSchedule', ['page_title' => 'Faculty Class Schedule']);
    })->name('faculty_ClassSchedule');

Route::get('/FacultyDashboard', function () {
    return view('Faculty/Faculty_Dashboard', ['page_title' => 'Faculty Dashboard']);
    })->name('faculty_Dashboard');

Route::get('/FacultyProfile', function () {
    return view('Faculty/Faculty_Profile', ['page_title' => 'Faculty Profile']);
    })->name('faculty_Profile');

Route::get('/FacultyReports', function () {
    return view('Faculty/Faculty_Reports', ['page_title' => 'Faculty Reports']);
    })->name('faculty_Reports');


//----------- Requirement Bin -----------------//
Route::get('/FacultyRequirementBin', function () {
    $requirementbins = DB::table('requirement_bins')->get();
    return view('Faculty/Faculty_RequirementBin', compact('requirementbins'));
})->name('faculty_RequirementBin');

});




//------------------------------------------------------------------ STAFF --------------------------------------------------------------------//
Route::middleware(['auth', 'isStaff'])->group(function () {
Route::get('/StaffClassObservation', function () {
    return view('Staff/Staff_ClassObservation', ['page_title' => 'Staff Class Observation']);
    })->name('Staff_ClassObservation');

Route::get('/StaffClassSchedule', function () {
    return view('Staff/Staff_ClassSchedule', ['page_title' => 'Staff Class Schedule']);
    })->name('Staff_ClassSchedule');

Route::get('/StaffDashboard', function () {
    return view('Staff/Staff_Dashboard', ['page_title' => 'Staff Dashboard']);
    })->name('Staff_Dashboard');

/**Staff Requirement Bin*/
Route::get('/StaffRequirementBin', function () {
    return view('Staff/Staff_RequirementBin', ['page_title' => ' Staff Requirement Bin']);
    })->name('staff_RequirementBin');

                //Retrieving Program Data in the DB
                Route::get('/StaffRequirementBin', function () {
                    $requirementbins = DB::table('requirement_bins')->get();
                    //Format the deadline or date into more readable date format
                    foreach ($requirementbins as $requirementbin) {
                        $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
                    }
                    return view('Staff/Staff_RequirementBin', compact('requirementbins'));
                });


    /**Staff Activities*/
Route::get('/StaffActivities', function () {
    return view('Staff/Staff_Activities', ['page_title' => ' Staff Activities']);
    })->name('staff_Activities');

            //Retrieving Activity Types Data in the DB
            Route::get('/StaffActivities', function () {
                $activitytypes = DB::table('activity_types')->get();

                $activities = DB::table('activities')
                    ->join('activity_types', 'activities.activity_type_id', '=', 'activity_types.id')
                    ->select('activities.title', 'activities.start_datetime', 'activities.status', 'activities.end_datetime', 'activity_types.title as type_title')
                    ->get();

                // Convert start_datetime and end_datetime to the desired format
                foreach ($activities as $activity) {
                    $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
                    $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
                }

                return view('Staff/Staff_Activities', compact('activities', 'activitytypes'));

            });

// Route::get('/StaffProfile', function () {
//     return view('Staff/Staff_Profile', ['page_title' => 'Staff Profile']);
//     })->name('Staff_Profile');

Route::get('/StaffReports', function () {
    return view('Staff/Staff_Reports', ['page_title' => 'Staff Reports']);
    })->name('Staff_Reports');
});


//------------------------------------------------------------------ DIRECTOR --------------------------------------------------------------------//
Route::middleware(['auth', 'isDirector'])->group(function () {
Route::get('/DirectorClassObservation', function () {
    return view('Director/Director_ClassObservation', ['page_title' => 'Director Class Observation']);
    })->name('Director_ClassObservation');

Route::get('/DirectorClassSchedule', function () {
    return view('Director/Director_ClassSchedule', ['page_title' => 'Director Class Schedule']);
    })->name('Director_ClassSchedule');

    Route::get('/DirectorActivities', function () {
        return view('Director/Director_Activities', ['page_title' => 'Director Activities']);
        })->name('Director_Activities');

    Route::get('/DirectorActivityTypes', function () {
        return view('Director/Director_ActivityTypes', ['page_title' => 'Director Class Schedule']);
        })->name('Director_ActivityTypes');


Route::get('/DirectorDashboard', function () {
    return view('Director/Director_Dashboard', ['page_title' => 'Director Dashboard']);
    })->name('Director_Dashboard');

// Route::get('/DirectorProfile', function () {
//     return view('Director/Director_Profile', ['page_title' => 'Director Profile']);
//     })->name('Director_Profile');

Route::get('/DirectorReports', function () {
    return view('Director/Director_Reports', ['page_title' => 'Director Reports']);
    })->name('Director_Reports');
});






require __DIR__.'/auth.php';
//This is like an extend/include function. It includes the auth.php route in this web.php route so that It can access the routes inside the auth.php




/*
 * June 17, 2023 <Sat> Daniel's modified part
 */


//For dropzone to display and upload req bin
Route::get('/Faculty_RequirementBin', [DropzoneController::class, 'Faculty_RequirementBin']);
Route::post('/Faculty_RequirementBin', [DropzoneController::class, 'store'])->name('dropzone.store');

//For dropzone to remove file
//Route::get('/uploaded_files', [DropzoneController::class, 'delete'])->name('dropzone.delete');
Route::delete('/deleteFile/{filename}', [DropzoneController::class, 'delete'])->name('deleteFile');

