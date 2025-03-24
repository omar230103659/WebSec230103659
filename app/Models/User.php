<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'permissions'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'permissions' => 'array',
    ];

    public function hasPermission($permission)
    {
        return in_array($permission, $this->permissions ?? []);
    }
    public function purchases()
{
    return $this->hasMany(\App\Models\Purchase::class);
}

    public function boughtProducts()
{
    return $this->belongsToMany(\App\Models\Product::class, 'purchases');
}

}



