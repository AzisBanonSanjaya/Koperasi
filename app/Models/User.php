<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['image_url', 'translated_date'];

    /**
     * Get the user's image URL.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image
                ? asset('storage/user/' . $this->image)
                : "https://forum.truckersmp.com/uploads/monthly_2019_09/imported-photo-12263.thumb.png.0a337947bd0458971e73616909a5b1f8.png",
        );
    }

    /**
     * Get the user's created date in a translated format.
     */
    protected function translatedDate(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->created_at)->translatedFormat('l, d F Y'),
        );
    }

    /**
     * Scope a query to exclude super admin.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotSuperAdmin(Builder $query): Builder
    {
        return $query->where('id', '!=', 1);
    }

    public function tabungan()
    {
        return $this->hasMany(Tabungan::class, 'nik', 'nik');
    }
}