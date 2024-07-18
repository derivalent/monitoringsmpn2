<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'telepon',
    //     'nip',
    //     'jabatan',
    //     'jenis_kelamin',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'pendidikan_terakhir',
    //     'bidang_studi',
    //     'status_pekerjaan',
    //     'role',
    //     'alamat',
    //     'created_at',
    // ];
    protected $fillable = [
        'nip',
        'name',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pendidikan_terakhir',
        'jabatan',
        'status_pekerjaan',
        'bidang_studi',
        'role',
        'alamat',
        'email',
        'telepon',
        'password',
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
    ];
}
