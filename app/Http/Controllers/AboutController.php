<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request) {

        $body['title'] = 'Giới Thiệu';
        $body['header'] = '';
        $body['footer'] = '';

        // $user = User::find(session('user'));

        // $categories = Category::all();

        return view('frontend.pages.about')->with(compact('body'));
    }
}
