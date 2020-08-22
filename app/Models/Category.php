<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'color'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function pendingTasks()
    {
        return $this->hasMany(Task::class)->where('state', 0);
    }
    
    public function processingTasks()
    {
        return $this->hasMany(Task::class)->where('state', 1);
    }

    public function completedTasks()
    {
        return $this->hasMany(Task::class)->where('state', 2);
    }
}
