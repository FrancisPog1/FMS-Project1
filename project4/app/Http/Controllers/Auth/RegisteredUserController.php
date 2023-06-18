<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {               
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function Create_User(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //These are my code where it saves the email, password, and user ID
        $user = new User();
        $user->id = Str::uuid()->toString();        //The uuid will generate a string. It will act as default value for the ID
        $user->email = $request ->email;
        $user->password = Hash::make($request ->password);  
        $user->save();

        //These are the old codes for saving the new user.
        // $user = User::create([
 
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'id' => Str::uuid()->toString()
        // ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::AddUser_PAGE);
    }
}
