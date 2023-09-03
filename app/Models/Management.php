<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['image1'];

    protected $translatedAttributes = ['main_title', 'description'];

}