<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }
}
