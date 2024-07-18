<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Category;
class ContactController extends Controller
{
    public function index() {
        $body = [
            'title' => 'Liên Hệ',
            'header' => '',
            'footer' => '',
        ];

        return view('frontend.pages.contact', compact('body'));
    }


}
