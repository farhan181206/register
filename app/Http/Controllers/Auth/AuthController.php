<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        $phone = $request->phone;
        if(Str::startsWith($phone,'+62'))
        {
            $phone = '0' . substr($phone,3);
        }elseif(Str::startsWith($phone,'62'))
        {
            $phone = '0' . substr($phone,2);
        }

        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => "required|min:11|max:13|unique:users,phone,{$phone}",
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);


        // mengecek apakah user sudah ada atau belum
        if(User::where('phone',$phone)->exists())
        {
            return redirect()->back()->withErrors(['phone' => 'Nomor Sudah di pake boss']);
        }

        $data['otp'] = rand(111111,999999);
        $data['access'] = 'no';
        // $data['phone'] = $phone;

        $user = User::create($data);
        // dd($user);
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
