<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDescription extends Model
{
    use HasFactory;

    protected $table = 'contacts_description';

    protected $fillable = [
        'address',
        'language_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
