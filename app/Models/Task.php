<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'task', 'description', 'status', 'priority', 'due_date'])]
#[Guarded(['id'])]
class Task extends Model
{
    //  
}