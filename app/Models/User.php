<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_id',
        'role',
        'branch_office'
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

    public function trafos(){
        return $this->hasMany(Trafo::class, 'user_id', 'id');
    }

    public function maintenance(){
        return $this->hasMany(Maintenance::class, 'user_id', 'id');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('role', 'admin')->exists();
    }

    // public function notifications()
    // {
    //     return $this->hasMany(DatabaseNotification::class);
    // }


    // public function notifications()
    // {
    //     return $this->hasMany(\App\Models\Notification::class);
    // }

}
