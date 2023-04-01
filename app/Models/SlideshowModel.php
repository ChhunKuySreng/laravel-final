<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideshowModel extends Model
{
    use HasFactory;
    protected $table = 'slideshows';
    protected $primaryKey = 'id';
    protected $fillable = ['title','subtitle','text','link','enabled','img','order'];
}
