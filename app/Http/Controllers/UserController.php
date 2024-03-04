<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $hashedPassword = Hash::make($request->password);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $hashedPassword;
        $user->role = $request->role;
        $user->save();

        session()->flash('success', 'Data berhasil disimpan!');

        return redirect()->route('User::index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->save();
        $request->session()->flash('success', 'Data berhasil diperbarui!');

        return redirect()->route('User::index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('success', 'Data berhasil dihapus!');
        return redirect()->route('User::index');
    }

    public function resetPassword($id)
    {
        $user = User::find($id);

        return view('user.reset-password', ['user' => $user]);
    }

    public function savePassword(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            if ($request->input('new_password') === $request->input('confirm_password')) {
                $user->password = Hash::make($request->input('new_password'));
                $user->save();

                return redirect()->route('User::index')->with('success', 'Password berhasil diubah!');
            } else {
                return redirect()->route('User::resetPassword', $id)->with('error-reset-password', 'Password gagal diubah! Pastikan konfirmasi password sesuai.');
            }
        }

        return redirect()->route('User::index')->with('error-reset-password', 'Gagal menyimpan password.');

    }

}
