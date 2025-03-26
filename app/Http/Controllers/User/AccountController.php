<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.account.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'address'  => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'address'  => $request->address,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'user', // mặc định là user
        ]);

        return redirect()->route('account.login.form')->with('register_success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function showLoginForm()
    {
        return view('user.account.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        session([
            'user' => [
                'id'   => $user->id,
                'name' => $user->name,
            ]
        ]);

        return redirect()->route("user.dashboard");
    }

    return back()->withErrors(['email' => 'Email hoặc mật khẩu không chính xác']);
}

    


public function logout(Request $request)
{
    $request->session()->forget('user');
    return redirect()->route('account.login.form');
}


public function profile(Request $request)
{
    if (!$request->session()->has('user')) {
        return redirect()->route('account.login.form')->with('error', 'Please login first.');
    }

    $user = User::find($request->session()->get('user.id'));
    return view('user.account.profile', compact('user'));
}

public function updateProfile(Request $request)
{
    if (!$request->session()->has('user')) {
        return redirect()->route('account.login.form')->with('error', 'Please login first.');
    }

    $user = User::find($request->session()->get('user.id'));

    $request->validate([
        'name'     => 'required|string|max:255',
        'address'  => 'nullable|string|max:255',
        'phone'    => 'nullable|string|max:20',
        'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',

    ]);

    $user->name    = $request->name;
    $user->address = $request->address;
    $user->phone   = $request->phone;
    $user->email = $request->email;

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    session([
        'user' => [
            'id'   => $user->id,
            'name' => $user->name,
        ]
    ]);

    return back()->with('success', 'Cập nhật thông tin thành công!');
}

}
