<?php

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product 'Google Tablet'
        $product_google = ProductType::create([
            'title' => 'Google tablet'
        ]);

        $product = Product::create([
            'product_type_id' => $product_google->id,
            'attribute_set_id' => 1,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_google),
        ]);

        $product = Product::create([
            'product_type_id' => $product_google->id,
            'attribute_set_id' => 2,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_google),
        ]);

        // Product 'Microsoft Tablet'
        $product_microsoft = ProductType::create([
            'title' => 'Microsoft tablet'
        ]);

        $product = Product::create([
            'product_type_id' => $product_microsoft->id,
            'attribute_set_id' => 3,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_microsoft),
        ]);

        $product = Product::create([
            'product_type_id' => $product_microsoft->id,
            'attribute_set_id' => 4,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_microsoft),
        ]);

        // Product 'Apple Tablet'
        $product_apple = ProductType::create([
            'title' => 'Apple tablet'
        ]);

        $product = Product::create([
            'product_type_id' => $product_apple->id,
            'attribute_set_id' => 5,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_apple),
        ]);

        $product = Product::create([
            'product_type_id' => $product_apple->id,
            'attribute_set_id' => 6,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_apple),
        ]);

    }
}
