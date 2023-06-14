<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Brian2694\Toastr\Facades\Toastr;

class Dashboard_Controller extends Controller
{
    /**Academic Head Dashboard */
    public function dashboard(){
        return view("Academic_head.AcadHead_Dashboard.INTG_AcadHead_Dashboard");
    }

}
 
