<?php

namespace App;

use App\Models\Username;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Courses;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use League\CommonMark\Cursor;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,CrudTrait,HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function courses(){

        return $this->hasMany(Courses::class,'course_id');
    }
    public function couresss(){
        return $this->belongsToMany(Courses::class,'course_id')->withPivot('id','username','couresname');
    }
}
