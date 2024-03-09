<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterTitle extends Model
{
    use HasFactory;

    protected $table = 'footer_titles';

    protected $fillable = [
        'footer_grid',
        'title',
        'language_id'
    ];
}
