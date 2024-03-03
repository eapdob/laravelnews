<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfoDescription extends Model
{
    use HasFactory;

    protected $table = 'footer_infos_description';

    protected $fillable = [
        'footer_info_id',
        'language_id',
        'description',
        'copyright'
    ];

    public function footerInfo()
    {
        return $this->belongsTo(FooterInfo::class);
    }
}
