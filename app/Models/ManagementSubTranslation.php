<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementSubTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['logo_title', 'short_title_logo', 'long_title_logo'];
}
