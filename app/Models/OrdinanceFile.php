<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdinanceFile extends Model
{
    use HasFactory;

    protected $fillable  = [
        'file_path',
        'version',
        'last_action',
        'last_action_date'
    ];
    public function files()
    {
        return $this->hasMany(OrdinanceFile::class);
    }

}
