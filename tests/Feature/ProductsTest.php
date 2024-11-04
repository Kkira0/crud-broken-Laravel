<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;


class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_contains_empty_table(): void
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('No products found');
        $response->assertSee(value: 'New product');
    }

    public function test_homepage_contains_non_empty_table(): void
    {
        $product = Product::create([
            'name' => 'Product 1',
            'qty' => 25,
            'price' => 1.46,
            'description' => 'Some milk'
        ]);

        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('Product 1');
        $response->assertDontSee('No products found');
        $response->assertSee(value: 'New product');

        $response->assertViewHas('products', function($collection) use($product) {
            return $collection->contains($product);
        });
    }

    public function test_paginated_products_table_doesnt_contain_11th_record(): void
    {
        $products = Product::factory(11)->create();

        $response = $this->get('/products');
        $response->assertStatus(200);

        $product11 = $products->last();

        $response->assertViewHas('products', function($collection) use($product11) {
            return !$collection->contains($product11);
        });

    }
}
