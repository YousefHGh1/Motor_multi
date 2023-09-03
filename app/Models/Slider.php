<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['main_title', 'description', 'maintenance_button', 'materials_button', 'question'];
    protected $fillable = [
        'whatsapp_link', 'tiktok_link', 'snapcaht_link', 'instagram_link', 'youtube_link',
        'background', 'logo', 'maintenance_link', 'materials_link'
    ];
}