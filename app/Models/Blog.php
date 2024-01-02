<?php

namespace App\Models;

use App\Collections\BlogCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
    ];
    
    public function getRouteKeyName(): string
    {
        return 'name';
    }


    /**
     * Create a new Eloquent Collection instance.
     */
    public function newCollection(array $models = []): Collection
    {
        return new BlogCollection($models);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }    

    /**
     * 내 구독자
     */
    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->as('subscription');
    }
              
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * 댓글
     */
    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Post::class, secondKey: 'commentable_id')
            ->where('commentable_type', Post::class);
    }
        
}
