<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['main_title', 'description', 'maintenance_button', 'materials_button', 'question'];

}