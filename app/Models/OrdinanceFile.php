<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdinanceFile extends Model
{
    use HasFactory;

    protected $fillable  = [
        'file_path',
        'version'
    ];
    public function files()
    {
        return $this->hasMany(OrdinanceFile::class);
    }

}
