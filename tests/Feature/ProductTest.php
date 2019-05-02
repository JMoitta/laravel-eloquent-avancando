<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        \factory(\App\Product::class)->create();
        $data = \DB::table('products')->first();
        $this->assertDatabaseHas('products', (array) $data);
        // $this->assertDatabaseMisssing('products', (array) $data);
        // $this->assertSoftDelete('products', (array) $data);
    }
}
