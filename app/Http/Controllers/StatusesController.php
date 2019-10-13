<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    public function __construct()
    {
        // 只允许登录用户
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        // Auth::user()可以获取到当前登录的用户实例
        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);

        session()->flash('success', '发布成功！');

        // 返回上一个页面
        return redirect()->back();
    }
}
