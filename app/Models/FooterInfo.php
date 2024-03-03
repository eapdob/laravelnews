<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    use HasFactory;

    protected $table = 'footer_infos';

    protected $fillable = [
        'logo'
    ];

    public function description()
    {
        return $this->hasMany(FooterInfoDescription::class);
    }
}
