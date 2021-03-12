<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportType extends Model
{
    //  SupportType = support_types
    use HasFactory;

    protected $fillable = [
        'tag',
        'title',
        'description',
    ];

    public $timestamps = false;
}
