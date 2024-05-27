<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.forgot-password');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.email.forgot-password',['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Ubah Password');
        });

        return back()->with('message','Kami Telah Mengirimkan Link Forgot Password Ke Email Anda');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.forgot-password-link',['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$updatePassword)
        {
            return back()->withInput()->with('error','Invalid Token');
        }

        $user = User::where('email',$request->email)
            ->update(['password' => Hash::make($request->password)]
        );

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->route('login')->with('success','Password anda Berhasil di ubah, silahkan login');
    }
}
