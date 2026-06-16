<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ClaimRequest;
use Spatie\Permission\Traits\HasRoles; // <--- 1. TAMBAHKAN IMPORT INI

class User extends Authenticatable implements FilamentUser
{
    // <--- 2. TAMBAHKAN HASROLES DI DALAM SINI JUGAA
    use HasFactory, Notifiable, HasRoles; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Batasi akses panel admin hanya role admin (tetap aman bawaan lu)
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi claim barang (tetap aman bawaan lu)
    public function claimRequests()
    {
        return $this->hasMany(ClaimRequest::class);
    }
}