<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/';

    // public function __construct()
    // {
    //     $this->middleware('guest:admin', ['except' => 'logout']);
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
        $user = new Admin;
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

    protected function adminRegister()
    {
        $data['pageTitle'] = 'Register';
        $data['pageName'] = 'Register';

        return view('backend.register')->with($data);
    }

    public function adminLogin()
    {
        $data['pageTitle'] = 'Login';
        $data['pageName'] = 'Login';

        return view('backend.auth.login')->with($data);
    }

    public function adminLoginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
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
        if (auth()->guard('admin')->attempt($credentials)) {
            $user = auth()->guard('admin')->user();
            if ($user) {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return back()->with('fail', 'your username and password are wrong.');
        }
    }

    public function changePassword()
    {
        $data['page'] = 'change-password';

        return view('backend.auth.change-password')->with($data);
    }

    public function changePasswordSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
        ]);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        $user = auth()->user();
        $current_password = $request->current_password;
        if (Hash::check($current_password, $user->password)) {
            $user_data['password'] = bcrypt($request->new_password);
            $user->update($user_data);
            Auth::guard('admin')->logout();
            $output = ['success' => 1, 'msg' => 'Password Successfully Changed'];

            return redirect('/')->with('success', 'Password Successfully Changed');
        } else {
            $output = ['success' => 0, 'msg' => 'Current Password is Incorrect'];

            return redirect('/change-password')->with('status', $output);
        }
    }

    public function profileUpdate()
    {
        $user = auth()->user();
        $this->user_data['senddata'] = Admin::where('id', $user->id)->first();
        $this->user_data['page'] = 'profile-update';

        return view('backend.auth.profile-update')->with($this->user_data);
    }

    public function profileupdateSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $user_name = $request->user_name;
        try {
            $user = auth()->user();

            $user_data['first_name'] = $first_name;
            $user_data['last_name'] = $last_name;
            $user_data['username'] = $user_name;
            $user->update($user_data);
            $output = ['success' => 1, 'msg' => 'Profile updated Successfully'];

            return redirect('/dashboard')->with('status', $output);
        } catch (Exception $e) {
            $output = ['success' => 0, 'msg' => 'Something error'];

            return redirect()->back()->withInput()->with('status', $output);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }
}
