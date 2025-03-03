<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['title', 'description', 'completed', 'do_before', 'recurrence'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'do_before' => 'datetime',
    ];
}
