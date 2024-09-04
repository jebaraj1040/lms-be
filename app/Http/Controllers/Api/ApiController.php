<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //Register Method - POST (name, email, password)
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'role_id' => 'required',
            'email' => 'required|email|unique:users|max:250',
            'password' => 'required|confirmed|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // User model to save user in database
        $user = User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $mailData = [
            'title' => 'User Registration Confirmation',
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeMail($mailData));

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $user,
        ]);

    }

    // Login API - POST (email, password)
    public function login(Request $request)
    {

        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $token = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (! $token) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid login details',
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'User logged in succcessfully',
            'token' => $token,
            'expires_in' => 60 * 60, //auth('api')->factory()->getTTL() * 60,
        ]);

    }

    // Profile API - GET (JWT Auth Token)
    public function profile()
    {
        Log::info('Profile Page Called');
        //$userData = auth()->user();
        $userData = request()->user();

        return response()->json([
            'status' => true,
            'message' => 'Profile data',
            'data' => $userData,
            //"user_id" => request()->user()->id,
            //"email" => request()->user()->email
        ]);
    }

    // Refresh Token API - GET (JWT Auth Token)
    public function refreshToken()
    {

        $token = auth()->refresh();

        return response()->json([
            'status' => true,
            'message' => 'New access token',
            'token' => $token,
            //"expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }

    // Logout API - GET (JWT Auth Token)
    public function logout()
    {

        auth()->logout();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
        ]);
    }
}
