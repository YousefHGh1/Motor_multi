<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementSub extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['logo', 'image1', 'email', 'phone', 'link1', 'link2'];

    protected $translatedAttributes = ['logo_title', 'short_title_logo', 'long_title_logo'];

    public function servicesSub()
    {
        return $this->hasMany(ServicesSub::class);
    }
}