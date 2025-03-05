<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Assuming your User model is in the App\Models namespace

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            return redirect('/admin/dashboard')->with('message', 'Welcome to the dashboard');
        } else {
            return redirect('/home')->with('status', 'Logged in successfully');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = bcrypt(Str::random(16));
            $newUser->save();

            Auth::login($newUser, true);
        }

        return redirect()->to('/dashboard'); // Adjust the URL as needed
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'An error occurred during Google login.');
    }
}



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
