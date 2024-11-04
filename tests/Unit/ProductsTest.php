<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Product;

class ProductsTest extends TestCase
{
    public function test_price_ui_display()
    {
        $product = new Product([
            'name' => 'Product 1',
            'qty' => 25,
            'price' => 1.46,
            'description' => 'Some milk'
        ]);

        $this->assertEquals("1.46 EUR", $product->getPriceEur());
    }

}
