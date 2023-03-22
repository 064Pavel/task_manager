<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'notes',
        'category_id',
        'priority_id',
        'user_id',
        'deadline',
        'is_completed'
    ];

    public function category() : HasOne{

        return $this->hasOne(Category::class, 'id', 'category_id');

    }

    public function priority() : HasOne
    {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }
}
