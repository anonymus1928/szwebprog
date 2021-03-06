<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'code', 'credit', 'public'
    ];

    public function teacher() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function students() {
        return $this->belongsToMany(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
