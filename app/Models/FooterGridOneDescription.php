<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridOneDescription extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_ones_description';

    protected $fillable = [
        'footer_grid_one_id',
        'language_id',
        'name'
    ];

    public function footerGridOne()
    {
        return $this->belongsTo(FooterGridOne::class);
    }
}
