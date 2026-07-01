<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'task', 'description', 'status', 'priority', 'due_date'])]
#[Guarded(['id'])]
class Task extends Model
{
    protected function casts(): array
    {
        return [
            'due_date' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByUser(Builder $query, User $user): Builder
    {
        return $query->whereBelongsTo($user);
    }

    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeByPriority(Builder $query, string $priority): Builder
    {
        return $query->where('priority', $priority);
    }

    public function scopeDueSoon(Builder $query, int $days = 7): Builder
    {
        return $query->whereBetween('due_date', [now(), now()->addDays($days)]);
    }
}
