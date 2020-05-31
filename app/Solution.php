<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = [
        'file', 'text'
    ];

    public function task() {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function student() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
