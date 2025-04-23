<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login
        $breadcrumb = (object) [
            'title' => 'Profil Saya',
            'list' => ['Home', 'Profil']
        ];

        $page = (object) [
            'title' => 'Profil Pengguna'
        ];

        $activeMenu = 'profile';

        return view('profile.index', compact('user', 'activeMenu', 'breadcrumb', 'page'));
    }

    public function edit()
    {
        $currentUser = Auth::user();
        return view('profile.edit', compact('currentUser'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:m_user,username,' . $user->user_id . ',user_id',
        ]);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profil berhasil diperbarui.'
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto_profile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        if ($user->foto_profile && Storage::exists($user->foto_profile)) {
            Storage::delete($user->foto_profile);
        }

        $file = $request->file('foto_profile');
        $filename = $user->username . '_' . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('uploads/profile', $filename, 'public');
        $user->foto_profile = $path;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Foto profil berhasil diperbarui.'
        ]);
    }
}
