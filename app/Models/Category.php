<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'show_at_nav',
        'status'
    ];

    public function description()
    {
        return $this->hasMany(CategoryDescription::class);
    }
}
