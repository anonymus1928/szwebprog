<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'teacher'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teacher_subjects() {
        return $this->hasMany(Subject::class);
    }

    public function student_subjects() {
        return $this->belongsToMany(Subject::class);
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }
}
