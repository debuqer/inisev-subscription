<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'sent_at',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
