<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideshowModel extends Model
{
    use HasFactory;
    protected $table = 'slideshows';
    protected $primaryKey = 'id';
    protected $fillable = ['title_en','subtitle_en','text_en','title_kh','subtitle_kh','text_kh','link','enabled','img','order'];
}
