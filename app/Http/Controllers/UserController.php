<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
  function login(Request $request)
  {
    $user = User::where('email', $request->email)->first();
    // print_r($data);
    if (!$user || !Hash::check($request->password, $user->password)) {
      return response([
        'message' => ['These credentials do not match our records.']
      ], 404);
    }

    $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }

  public function index(){
    $users = User::where('role_as','0')->get();
    return view('admin.user.index',compact('users'));
  }

  public function viewuser($id){
    $user = User::findOrFail($id);
    return view('admin.user.view',compact('user'));
  }
}
