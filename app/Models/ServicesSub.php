<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesSub extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    public $translatedAttributes = ['logo_title', 'short_title_logo', 'long_title_logo'];
    protected $fillable = ['image1', 'logo', 'management_sub_id'];

    public function managementSub()
    {
        return $this->belongsTo(ManagementSub::class);
    }

}