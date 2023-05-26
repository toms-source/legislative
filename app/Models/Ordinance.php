<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{
    use HasFactory;

    protected $fillable  = [
        'ordinance_number',
        'title',
        'tracking_level',
        'date',
        'last_action',
        'last_action_date',
        'file_path',
        'author',
        'keywords',
    ];
}
