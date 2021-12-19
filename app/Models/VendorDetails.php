<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetails extends Model
{
    use HasFactory;

    public $table = 'vendor_details';

    protected $fillable = [
        'seqid',
        'reference_user',
        'category'
    ];
}
