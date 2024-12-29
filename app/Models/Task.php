<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'ref_no',
        'priority',
    ];

    public function scopeOrdered($query){
        return $query->orderBy('priority', 'asc');
    }
}
