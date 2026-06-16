<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Mark all unread notifications as read.
     */
    public function markNotificationsAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's password update form.
     */
    public function password(Request $request): View
    {
        return view('profile.password', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's notification preferences.
     */
    public function notifikasi(Request $request): View
    {
        return view('profile.notifikasi', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's language and region preferences.
     */
    public function bahasa(Request $request): View
    {
        return view('profile.bahasa', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile and cover photos.
     */
    public function updatePhotos(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_photo' => ['nullable', 'image', 'max:2048'],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo) {
                Storage::disk('public')->delete($user->cover_photo);
            }
            $user->cover_photo = $request->file('cover_photo')->store('cover-photos', 'public');
        }

        $user->save();

        return Redirect::back()->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Delete the user's profile or cover photo.
     */
    public function destroyPhoto(Request $request, $type): RedirectResponse
    {
        $user = $request->user();

        if ($type === 'profile' && $user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
            $user->profile_photo = null;
            $user->save();
            return Redirect::back()->with('success', 'Foto profil berhasil dihapus.');
        }

        if ($type === 'cover' && $user->cover_photo) {
            Storage::disk('public')->delete($user->cover_photo);
            $user->cover_photo = null;
            $user->save();
            return Redirect::back()->with('success', 'Foto sampul berhasil dihapus.');
        }

        return Redirect::back()->with('error', 'Gagal menghapus foto.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Alih-alih menghapus langsung, kita beri tanda bahwa user meminta penghapusan
        $user->update([
            'deletion_requested_at' => now()
        ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Permohonan hapus akun berhasil dikirim. Akun Anda sedang dalam masa peninjauan oleh Admin.');
    }
}
