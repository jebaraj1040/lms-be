<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserAuthController extends Controller
{
    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/';

    // public function __construct()
    // {
    //    $this->middleware('guest:web',['except' => 'logout']);
    // }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(Request $request)
    {
        $request->validate(['name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:30',
            'cpassword' => 'required|min:6|max:30|same:password'], [
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email id',
                'email.unique' => 'Email must have unique id',
                'email.email' => 'Please enter valid email id',
                'password.required' => 'Please enter password',
                'password.min' => 'Password must have minimum 6 characters',
                'password.max' => 'Password should not exceed more than 30 characters',
                'cpassword.same' => 'Password and confirm password not matching',
                'cpassword.required' => 'Please enter confirm password']);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $save = $user->save();
        if ($save) {
            return redirect()->back()->with('success', 'Your are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }

    }

    public function webLogin()
    {
        return view('frontend.login');
    }

    public function webRegister()
    {
        return view('frontend.register');
    }

    public function webLoginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:30',
        ], [
            'email.required' => 'Please enter your email id',
            'email.email' => 'Please enter valid email id',
            'email.exists' => 'Your email id not exist',
            'password.required' => 'Please enter password',
            'password.min' => 'Password must have minimum 6 characters',
            'password.max' => 'Password should not exceed more than 30 characters',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->guard('web')->attempt($credentials)) {
            $user = auth()->guard('web')->user();
            if ($user) {
                return redirect('/profile');
            }
        } else {
            return back()->with('fail', 'your username and password are wrong.');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
