<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridTwoDescription extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_twos_description';

    protected $fillable = [
        'footer_grid_one_id',
        'language_id',
        'name'
    ];

    public function footerGridTwo()
    {
        return $this->belongsTo(FooterGridTwo::class);
    }
}
