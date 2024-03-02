<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsDescription extends Model
{
    use HasFactory;

    protected $table = 'news_description';

    protected $fillable = [
        'news_id',
        'language_id',
        'title',
        'content',
        'meta_title',
        'meta_description'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
