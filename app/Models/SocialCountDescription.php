<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCountDescription extends Model
{
    use HasFactory;

    protected $table = 'social_counts_description';

    protected $fillable = [
        'social_count_id',
        'language_id',
        'fan_count',
        'fan_type',
        'button_text'
    ];

    public function socialCount()
    {
        return $this->belongsTo(SocialCount::class);
    }
}
