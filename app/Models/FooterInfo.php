<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    use HasFactory;

    protected $table = 'footer_infos';

    protected $fillable = [
        'logo'
    ];

    public function scopeWithLocalize($query)
    {
        return $query->whereHas('description', function ($query) {
            $query->where('language_id', getLanguageId());
        });
    }

    public function description()
    {
        return $this->hasMany(FooterInfoDescription::class);
    }
}
