<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
Use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Logout_Controller extends Controller
{
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect("/");
        }
        else{
            echo "Hindi pumasok";
        }
    }


}
 
