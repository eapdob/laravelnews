<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridThree extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_threes';

    protected $fillable = [
        'url',
        'status'
    ];

    public function description()
    {
        return $this->hasMany(FooterGridThreeDescription::class);
    }
}
