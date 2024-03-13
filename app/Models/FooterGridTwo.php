<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridTwo extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_twos';

    protected $fillable = [
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
        return $this->hasMany(FooterGridTwoDescription::class);
    }
}
