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
        return $query->whereHas('description', function ($query) {
            $query->where('language_id', getLanguageId());
        });
    }

    public function description()
    {
        return $this->hasMany(ContactDescription::class);
    }
}
