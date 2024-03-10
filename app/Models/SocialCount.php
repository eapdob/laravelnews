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
        return $query->whereHas('description', function ($query) {
            $query->where('language_id', getLanguageId());
        });
    }

    public function description()
    {
        return $this->hasMany(SocialCountDescription::class);
    }
}
