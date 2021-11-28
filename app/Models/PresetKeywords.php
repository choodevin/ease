<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresetKeywords extends Model
{
    use HasFactory;
    public $table = 'preset_keyword';
    public $timestamps = false;

    protected $fillable = [
        'seqid',
        'keyword'
    ];
}
