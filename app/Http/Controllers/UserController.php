<?php

namespace App\Http\Controllers;

use App\Events\Auth\UserActivationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function verification()
    {
        return view('auth.verification');
    }

    public function postverification(Request $request)
    {
        $user = User::where('token_activation', $request->otp)->first();
        if($user==null){
            return redirect()->back()->withError('OTP salah, Silahkan cek kembali');
        }else{
            $user->update([
                'isVerified' => true,
                'token_activation' => null
            ]);
            return redirect('login')->withSuccess('Terima Kasih, Akun Anda Telah Aktif');
        }
    }

    public function postresend(Request $request)
    {
        $this->validates($request);
        $user = User::where('email', $request->email)->first();

        // Send Email
        if($user==null){
            return redirect()->back();
        }else{
            $user->token_activation = Str::random(6);
            $user->save();
            event(new UserActivationEmail($user));

            return redirect()->route('verification')->withSuccess('Email Telah Berhasil Dikirim, Silahkan Cek Email Anda');
        }
    }
        
    protected function validates(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            "email.exists" => 'Emal tidak ditemukan, Silahkan Cek Kembali'
        ]);
    }
}
