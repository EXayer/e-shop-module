<?php

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\AttributeValueTranslate;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Common Attributes
        $attr_proc = Attribute::create([
            'title' => 'Processor'
        ]);

        $intel = AttributeValue::create([
            'attribute_id' => $attr_proc->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $intel->id,
            'value' => 'Intel Atom'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $intel->id,
            'value' => 'Интел Atom'
        ]);

        $attr_camera = Attribute::create([
            'title' => 'Camera'
        ]);

        $camera8 = AttributeValue::create([
            'attribute_id' => $attr_camera->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $camera8->id,
            'value' => '8Mpx'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $camera8->id,
            'value' => '8Мп'
        ]);

        // Product 'Google Tablet'
        $product_google = ProductType::create([
            'title' => 'Google tablet'
        ]);

        $product_google->attributeValues()->attach([
            $intel->id,
            $camera8->id,
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

        $product_microsoft->attributeValues()->attach([
            $intel->id,
            $camera8->id,
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

        $product = Product::create([
            'product_type_id' => $product_microsoft->id,
            'attribute_set_id' => 5,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_microsoft),
        ]);

        // Product 'Apple Tablet'
        $product_apple = ProductType::create([
            'title' => 'Apple tablet'
        ]);

        $product_apple->attributeValues()->attach([
            $intel->id,
            $camera8->id,
        ]);

        $product = Product::create([
            'product_type_id' => $product_apple->id,
            'attribute_set_id' => 6,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_apple),
        ]);

        $product = Product::create([
            'product_type_id' => $product_apple->id,
            'attribute_set_id' => 7,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_apple),
        ]);

        $product = Product::create([
            'product_type_id' => $product_apple->id,
            'attribute_set_id' => 8,
        ]);

        $product->update([
            'model_number' => $product->fakeModelNumber($product_apple),
        ]);

    }
}
