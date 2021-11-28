<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;

    public $table = 'contact_details';
    public $timestamps = false;

    protected $fillable = [
        'seqid',
        'reference_user',
        'facebook',
        'instagram',
        'whatsapp',
        'website',
        'tel'
    ];
}
