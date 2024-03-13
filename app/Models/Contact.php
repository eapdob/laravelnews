<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'phone',
        'email'
    ];

    public function scopeWithLocalize($query)
    {
        $languageId = getLanguageId();
        return $query->with(['description' => function ($query) use ($languageId) {
            $query->where('language_id', $languageId);
        }]);
    }

    public function description()
    {
        return $this->hasMany(ContactDescription::class);
    }
}
