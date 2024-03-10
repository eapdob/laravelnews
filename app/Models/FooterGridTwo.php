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
        return $query->whereHas('description', function ($query) {
            $query->where('language_id', getLanguageId());
        });
    }

    public function description()
    {
        return $this->hasMany(FooterGridTwoDescription::class);
    }
}
