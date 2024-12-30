<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'project_name',
        'ref_no',
        'body',
    ];


     /**
     * Get the comments for the blog post.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
