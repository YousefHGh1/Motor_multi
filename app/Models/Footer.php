<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['logo', 'image1', 'link1', 'link2', 'link3', 'link4', 'link5', 'link6', 'link7', 'link8', 'link9'];

    protected $translatedAttributes = ['description', 'link_down', 'link_contact', 'address','allsave'];

}