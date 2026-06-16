<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'nik', 'no_hp', 'alamat', 'is_admin', 'profile_photo', 'cover_photo', 'deletion_requested_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'deletion_requested_at' => 'datetime',
        ];
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function umpanBaliks()
    {
        return $this->hasMany(UmpanBalik::class);
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }

        $names = explode(' ', $this->name);
        $lastName = array_pop($names);
        $initial = strtoupper(substr($lastName, 0, 1));
        
        return 'https://ui-avatars.com/api/?name=' . $initial . '&color=FFFFFF&background=0284c7&size=128';
    }

    public function getCoverPhotoUrlAttribute()
    {
        if ($this->cover_photo) {
            return asset('storage/' . $this->cover_photo);
        }

        // Return a default gradient/pattern if no cover is set (handled in the view)
        return null;
    }
}
