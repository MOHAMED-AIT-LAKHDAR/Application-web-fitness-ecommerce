<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeCoverage\Driver\Driver;


class SocialiteController extends Controller
{
   public function redirectToGoogle()
   {
    return Socialite::Driver('google')->redirect();
   }

public function handGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('social_id', $user->id)->first();
        if($finduser){
                Auth::login($finduser);
                return response()->json($finduser);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => $user->google,
                    'password' => Hash::make('my-google')
                ]);

                Auth::login($newUser);
        
                return response()->json($newUser);
            }
}catch(\Exception $e){
    dd($e->getMessage());
}
}
}
