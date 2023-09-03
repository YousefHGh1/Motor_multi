<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['main_title', 'description', 'address1', 'address2'];

}