<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];

    public function getPriceEur(){
        return $this->price . " EUR";
    }

    static function doSomethingwithACollectionOfProducts(){
        return false;
        // class function
        // Product::doSomethingwithACollectionOfProducts();
    }
}
