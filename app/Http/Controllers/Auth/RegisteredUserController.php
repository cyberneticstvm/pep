<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['required', 'accepted'],
            'captcha' => 'required|captcha',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        //if (!$user->email_verified_at):
        $user->sendEmailVerificationNotification();
        return redirect()->route('verify.email')->with('success', 'Your registration was successful! Please verify your email id to continue.');
        //endif;
        //event(new Registered($user));

        //Auth::login($user);

        //$user->sendEmailVerificationNotification();

        //return redirect()->back()->with('success', 'User Registered Successfully!');

        //return redirect(route('dashboard', absolute: false))->with("success", "User Registered Successfully!");
    }

    function wishlist()
    {
        return view('user.wishlist');
    }

    function listing()
    {
        return view('user.listing');
    }

    function profile()
    {
        return view('user.profile');
    }

    function settings()
    {
        return view('user.settings');
    }
}
