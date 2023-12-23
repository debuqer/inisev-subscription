<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'website_id',
    ];

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->website->address.'?'.http_build_query([
            'post_id' => $this->getId(),
        ]);
    }

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
