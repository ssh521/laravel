<?php

namespace App\Models;

use App\Castables\Link;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory, Prunable;

    protected $fillable = [
        'original_name',
        'name',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'link' => Link::class,
    ];

    public function prunable()
    {
        return static::whereNull('post_id');
    }

    public function pruning()
    {
        Storage::disk('public')->delete($this->name);
    }


}
