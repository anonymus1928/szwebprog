<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'code', 'credit'
    ];

    public function teacher() {
        return $this->belongsTo(User::class);
    }

    public function students() {
        return $this->belongsToMany(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
