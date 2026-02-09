<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function showForgotForm()
    {
        return view('web.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        Password::sendResetLink($request->only('email'));

        return back()->with('status', 'Şifre sıfırlama linki oluşturuldu. storage/logs/laravel.log dosyasını kontrol edin.');
    }

    public function showResetForm(Request $request)
    {
        return view('web.auth.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            fn ($user, $password) => $user->update([
                'password' => bcrypt($password)
            ])
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Şifreniz başarıyla sıfırlandı, giriş yapabilirsiniz.')
            : back()->withErrors(['email' => 'Token geçersiz']);
    }
}
