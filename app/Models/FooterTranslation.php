<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterTranslation extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['description', 'link_down', 'link_contact', 'address','allsave'];
}