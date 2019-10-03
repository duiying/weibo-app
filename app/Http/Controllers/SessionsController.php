<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        // 登录页面只允许未登录用户访问
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    /**
     * 登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * 登录操作
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // 登录成功
            session()->flash('success', '登录成功');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);
        } else {
            // 登录失败
            session()->flash('danger', '邮箱或密码输入错误');
            return redirect()->back()->withInput();
        }
    }

    /**
     * 退出登录
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '已成功退出登录');
        return redirect('login');
    }
}
