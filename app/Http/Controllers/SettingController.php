<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    public function resetPassword()
    {
        $userId = Auth::id();
        return view('setting', compact('userId'));
    }

    public function savePassword(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($request->input('new_password') === $request->input('new_password_confirmation')) {
            $user = User::find($userId);
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            return redirect()->route('home')->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->route('setting')->with('error', 'Password gagal diubah! Pastikan konfirmasi password sesuai.');
        }
    }
}
