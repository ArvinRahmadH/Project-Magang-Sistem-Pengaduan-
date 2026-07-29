<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Ambil data profil user login
    public function getProfile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'profile_photo' => $user->profile_photo ? asset('storage/' . $user->profile_photo) : null,
        ]);
    }

    // Upload/update foto profil
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = $request->user();

        // hapus foto lama (optional)
        if ($user->profile_photo && \Storage::disk('public')->exists($user->profile_photo)) {
            \Storage::disk('public')->delete($user->profile_photo);
        }

        // simpan foto baru
        $path = $request->file('photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;
        $user->save();

        return response()->json([
            'message' => 'Foto profil berhasil diperbarui!',
            'photo_url' => asset('storage/' . $path),
        ]);
    }
}
