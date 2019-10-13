<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feedItems = [];

        // Auth::check()用于检查用户是否登录
        if (Auth::check()) {
            $feedItems = Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home', compact('feedItems'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
