<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Brian2694\Toastr\Facades\Toastr;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function render_acadhead_landing(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

    /**
    * I added this if else statement so that after the authentication it will check the
    * role and redirect the user to their deginated home page per role
    * Edited 06/19/23 01:02 PM
    */
         if (Auth::user()->foreign_role_id == '1') {
            return redirect()->intended(RouteServiceProvider::AcadHead_HOME)->with('success', 'Admin Login Successfull');
        }

        elseif (Auth::user()->foreign_role_id == '2') {
            return redirect()->intended(RouteServiceProvider::Faculty_HOME)->with('success', 'Faculty Login Successfull');

        }

        elseif (Auth::user()->foreign_role_id == '3') {
            return redirect()->intended(RouteServiceProvider::Staff_HOME)->with('success', 'Staff Login Successfull');

        }

        elseif (Auth::user()->foreign_role_id == '4') {
            return redirect()->intended(RouteServiceProvider::Director_HOME)->with('success', 'Director Login Successfull');
        }

        // else {
        // return redirect()->intended(RouteServiceProvider::Landing_PAGE)->with('error', 'Please enter valid credentials');
        // }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
