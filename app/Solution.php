<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = [
        'file', 'text'
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function student() {
        return $this->belongsToMany(User::class);
    }
}
