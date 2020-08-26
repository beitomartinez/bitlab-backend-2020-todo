<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'level',
        'complete_date'
    ];

    protected $dates = ['complete_date'];

    public function getHumanLevelAttribute()
    {
        switch ($this->level) {
            case 0:
                return 'Normal';
                break;
            case 1:
                return 'Importante';
                break;
            case 2:
                return 'Urgente';
                break;
        }
    }
    
    public function getHumanStateAttribute()
    {
        switch ($this->state) {
            case 0:
                return 'Pendiente';
                break;
            case 1:
                return 'En curso';
                break;
            case 2:
                return 'Completada';
                break;
        }
    }

    public function isDueSoon() : bool
    {
        $output = false;
        if ($this->state < 2) {
            if ($this->complete_date->diffInDays() <= 3) {
                $output = true;
            }
        }

        return $output;
    }
    
    public function isPastDue() : bool
    {
        $output = false;
        if ($this->state < 2) {
            if (now()->gt($this->complete_date)) {
                $output = true;
            }
        }

        return $output;
    }

    // RELATIONSHIPS
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
