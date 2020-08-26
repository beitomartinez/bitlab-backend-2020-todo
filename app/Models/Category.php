<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'color'];

    /**
     * Returns all tasks
     *
     * @return void
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Returns tasks with state "pending"
     *
     * @return void
     */
    public function pendingTasks()
    {
        return $this->hasMany(Task::class)->where('state', 0);
    }
    
    /**
     * Returns tasks with state "processing"
     *
     * @return void
     */
    public function processingTasks()
    {
        return $this->hasMany(Task::class)->where('state', 1);
    }

    /**
     * Returns tasks with state "completed"
     *
     * @return void
     */
    public function completedTasks()
    {
        return $this->hasMany(Task::class)->where('state', 2);
    }
}
