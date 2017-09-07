<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
//ファイル名とモデル名は同じに
{
    protected $fillable = ['content', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
