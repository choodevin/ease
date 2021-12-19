<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $table = 'user';

    protected $fillable = [
        'seqid',
        'email',
        'name',
        'password',
        'type',
        'address',
        'referral_code',
    ];
}
