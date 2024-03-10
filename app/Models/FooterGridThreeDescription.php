<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridThreeDescription extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_threes_description';

    protected $fillable = [
        'footer_grid_one_id',
        'language_id',
        'name'
    ];

    public function footerGridThree()
    {
        return $this->belongsTo(FooterGridThree::class);
    }
}
