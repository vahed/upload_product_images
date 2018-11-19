<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id', 'photoId', 'image_name', 'product_name', 'comment'];
}
