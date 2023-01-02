<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout', 'login']);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', __('messages.login.email_not_exists'));
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', __('messages.login.password_wrong'));
        }

        if ($this->guard()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (!($this->guard()->user()->role == UserRole::ADMIN)) {
                $this->guard()->logout();

                return redirect()->back()->with('error', __('messages.login.unauthorized'));
            } elseif ($this->guard()->user()->status == UserStatus::BLOCK) {
                $this->guard()->logout();

                return redirect()->back()->with('error', __('messages.login.account_locked'));
            } else {
                // return redirect()->intended(RouteServiceProvider::HOME);
                return redirect('/admin/dashboard')->with('success', __('messages.login.success'));
            }
        }
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect()->route('admin.login_form');
    }
}
