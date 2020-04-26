<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'points', 'from', 'until'
    ];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }
}
