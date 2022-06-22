<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequests;
use App\Http\Requests\Auth\RegisterRequests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(LoginRequests $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 1])) {
            return redirect('admin-sport');
        } elseif (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 2])) {
            return redirect('manager-sport');
        } elseif (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 3])) {
            return redirect('sport-index');
        } else {
            Session::flash('error', 'Email or password wrong');
            return redirect('/login');
        }
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(RegisterRequests $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => bcrypt($request['password']),
            'password_confirmation' => $request['password_confirmation'],
        ];
        $user = User::create($data);
        $user->setRememberToken(Str::random(60));
        $user->save();
        auth()->login($user);
        if ($user) {
            Session::flash('success', 'Register Successfull!');
            return redirect('/login');
        } else {
            Session::flash('error', 'Register Fail!');
            return redirect('/register');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
