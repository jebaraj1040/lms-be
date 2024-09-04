<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function getProduct(Request $request)
    {
        echo '<pre>';
        print_r($request->all());
        exit;
    }

    public function showProfile()
    {
        echo 'cube user profile';
        exit;
    }
}
