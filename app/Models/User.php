<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

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
        'password'
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

    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $users = DB::table('users')
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->select("users.id", "users.name","users.email", "cities.name as city_name");

        $bootgrid->query($users, $request, ['users.id','users.name','cities.name', 'users.email' ]);
        return $bootgrid;

    }

    public function city(){
        return $this->belongsTo(City::class);

    }


}
