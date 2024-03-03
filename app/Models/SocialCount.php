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

    public function description()
    {
        return $this->hasMany(SocialCountDescription::class);
    }
}
