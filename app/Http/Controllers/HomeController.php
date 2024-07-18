<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {

        $body['title'] = 'Trang chủ';
        $body['header'] = '';
        $body['footer'] = '';

        // $user = User::find(session('user'));

        // $categories = Category::all();

        return view('frontend.pages.home')->with(compact('body'));
    }
}
