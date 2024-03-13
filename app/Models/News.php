<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function scopeActiveEntries($query)
    {
        return $query->where([
            'status' => 1,
            'is_approved' => 1
        ]);
    }

    public function scopeWithLocalize($query)
    {
        $languageId = getLanguageId();
        return $query->with(['description' => function ($query) use ($languageId) {
            $query->where('language_id', $languageId);
        }]);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
            ->select(
                'categories.id as id',
                'categories.slug as slug',
                'categories.show_at_nav as show_at_nav',
                'categories.status as status',
                'categories_description.language_id as language_id',
                'categories_description.name as name'
            )
            ->where('categories_description.language_id', getLanguageId());
    }

    public function categorySearch()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function description()
    {
        return $this->hasMany(NewsDescription::class);
    }
}
