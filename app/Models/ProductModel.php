<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['prod_name','prod_description','prod_size','prod_qty','prod_price','sub_cat_id','img','prod_status','prod_barcode'];
}
