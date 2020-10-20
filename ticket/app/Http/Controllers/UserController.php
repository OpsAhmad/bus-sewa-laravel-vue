<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $status = 'success';
            $user = Auth::user();
            $remember_token = Auth::user()->getRememberToken();
            return response()->json(compact('status', 'user', 'remember_token'), 200);
        }
        return response()->json(['status' => 'fail'], 400);
    }

    public function register()
    {
        $v = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'remember_token' => Str::random(100),
        ];

        User::create($data);

        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];
        $status = 'success';

        $remember_token = $data['remember_token'];
        return response()->json(compact('status', 'user', 'remember_token'), 200);
    }

    public function detail()
    {
        if ($remember_token = request()->get('token')) {
            $user = User::where('remember_token', $remember_token)->first();
            if ($user->count() > 0) {
                $status = 'success';
                $user = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ];
                return response()->json(compact('status', 'user'), 200);
            }
            return response()->json(['status' => 'token invalid'], 400);
        } else {
            return response()->json(['status' => 'token invalid'], 400);
        }
    }
}
