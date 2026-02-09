<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    // Ayarlar sayfası
    public function index()
    {
        return view('admin.settings.index');
    }

    // Şifre güncelleme
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = Auth::user();

        // Mevcut şifre doğru mu?
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Mevcut şifre yanlış.',
            ]);
        }

        // Yeni şifreyi kaydet
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Şifre başarıyla güncellendi.');
    }
}
