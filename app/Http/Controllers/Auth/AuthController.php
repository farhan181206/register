<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Fonnte;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use Fonnte;
    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $phone = $request->phone;
        if(Str::startsWith($phone,'+62'))
        {
            $phone = '0' . substr($phone,3);
        }elseif(Str::startsWith($phone,'62'))
        {
            $phone = '0' . substr($phone,2);
        }

        $message = [
            'phone.required' => 'Nomor Wajib Diisi!!',
            'password.required' => 'Password Wajib Diisi',
            'phone.exists' => 'Nomor atau password Salah',
        ];

        $request->validate([
            'phone' => 'required|exists:users,phone',
            'password' => 'required',
        ],$message);

        $credentials = [
            'phone' => $phone,
            'password' => $request->password,
        ];

        $user = User::where('phone',$phone)->first();
        if($user && $user->access == 'no')
        {
            session(['user' => $user]);
            $random_url = Str::random(64);
            return redirect()->route('verify',compact('phone','random_url'));
        }

        //nomor hp dan password
        if(Auth::attempt($credentials,$request->has('remember')))
        {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->withErrors(['phone' => 'Nomor atau password Salah']);
        }
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
        $data['phone'] = $phone;
        
        $user = User::create($data);
        // dd($user);
        // Auth::login($user);
        $random_url = Str::random(64);
        $pesan = "Ini Otp Anda " . $user->otp;
        $this->send_message($phone,$pesan);

        session(['user' => $user]);
        
        return redirect()->route('verify',compact('phone','random_url'));
    }

    public function verify()
    {
        $user = session('user');
        // dd($user);
        return view('auth.verify',compact('user'));
    }

    public function verify_process(Request $request)
    {
        //ambil otp yang di kirimkan
        $otp = $request->otp;

        //cari user berdasarkan otp
        $user = User::where('otp',$otp)->first();
        
        //jika pnegguna tidak di temukan 
        if(!$user)
        {
            return redirect()->back()->with('error','Kamu Salah Memasukkan Token');
        }

        //jika pengguna di temukan
        if($user->access == 'no')
        {
            $user->update([
                'access' => 'yes',
            ]);

            Auth::login($user);

            return redirect()->route('dashboard');
        }else{
            //jika token sudah di gunakan kita kirimkan pesan kadeluarsa
            return redirect()->back()->with('error','Token Sudah kadeluwarsa');
        }
    }

    public function resend(Request $request)
    {
        $phone = $request->phone;

        $user = User::where('phone',$phone)->first();

        $user->update([
            'otp' => rand(111111,999999),
        ]);

        $pesan = "Ini Otp Anda " . $user->otp;
        $this->send_message($phone,$pesan);

        $random_url = Str::random(64);

        return redirect()->route('verify',compact('phone','random_url'));
    }
}
