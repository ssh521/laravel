<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'content',
    ];    

    /**
     * 작성자
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * 다형성
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
        
    /**
     * 부모
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id')
            ->withTrashed();
    }

    /**
     * 대댓글
     *
     * @return mixed
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
            ->withTrashed();
    }

}
