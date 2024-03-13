<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCount extends Model
{
    use HasFactory;

    protected $table = 'social_counts';

    protected $fillable = [
        'icon',
        'color',
        'url',
        'status'
    ];

    public function scopeActiveEntries($query)
    {
        return $query->where([
            'status' => 1
        ]);
    }

    public function scopeWithLocalize($query)
    {
        $languageId = getLanguageId();
        return $query->with(['description' => function ($query) use ($languageId) {
            $query->where('language_id', $languageId);
        }]);
    }

    public function description()
    {
        return $this->hasMany(SocialCountDescription::class);
    }
}
