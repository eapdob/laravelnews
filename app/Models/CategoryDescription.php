<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    use HasFactory;

    protected $table = 'categories_description';

    protected $fillable = [
        'category_id',
        'language_id',
        'name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
