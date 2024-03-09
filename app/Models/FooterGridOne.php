<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridOne extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_ones';

    protected $fillable = [
        'url',
        'status'
    ];

    public function description()
    {
        return $this->hasMany(FooterGridOneDescription::class);
    }
}
