<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterGridTwo extends Model
{
    use HasFactory;

    protected $table = 'footer_grid_twos';

    protected $fillable = [
        'url',
        'status'
    ];

    public function description()
    {
        return $this->hasMany(FooterGridTwoDescription::class);
    }
}
