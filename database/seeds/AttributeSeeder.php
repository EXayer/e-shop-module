<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\AttributeSet;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Attribute 'Color'
        $attr_color = Attribute::create([
            'title' => 'Color'
        ]);

        $golden = AttributeValue::create([
            'attribute_id' => $attr_color->id,
            'value' => 'Golden'
        ]);

        $silver = AttributeValue::create([
            'attribute_id' => $attr_color->id,
            'value' => 'Silver'
        ]);

        $grey = AttributeValue::create([
            'attribute_id' => $attr_color->id,
            'value' => 'Grey'
        ]);

        // Attribute 'RAM'
        $attr_ram = Attribute::create([
            'title' => 'RAM'
        ]);

        $ram4 = AttributeValue::create([
            'attribute_id' => $attr_ram->id,
            'value' => '4GB'
        ]);

        $ram8 = AttributeValue::create([
            'attribute_id' => $attr_ram->id,
            'value' => '8GB'
        ]);

        $ram16 = AttributeValue::create([
            'attribute_id' => $attr_ram->id,
            'value' => '16GB'
        ]);

        // Attribute 'Storage'
        $attr_storage = Attribute::create([
            'title' => 'Storage'
        ]);

        $storage64 = AttributeValue::create([
            'attribute_id' => $attr_storage->id,
            'value' => '64GB'
        ]);

        $storage128 = AttributeValue::create([
            'attribute_id' => $attr_storage->id,
            'value' => '128GB'
        ]);

        $storage256 = AttributeValue::create([
            'attribute_id' => $attr_storage->id,
            'value' => '256GB'
        ]);

        // Product Sets
        // #1 google
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $golden->id,
            $ram4->id,
            $storage64->id,
        ]);

        // #2 google
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $golden->id,
            $ram4->id,
            $storage128->id,
        ]);

        // #3 microsoft
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $golden->id,
            $ram4->id,
            $storage256->id,
        ]);

        // #4 microsoft
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $grey->id,
            $ram16->id,
            $storage64->id,
        ]);

        // #5 microsoft
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $storage128->id,
        ]);

        // #6 apple
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $grey->id,
            $ram4->id,
            $storage256->id,
        ]);

        // #7 apple
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $silver->id,
            $ram4->id,
            $storage64->id,
        ]);

        // #8 apple
        AttributeSet::create([
            'price' => rand(100, 1000),
        ])->attributeValues()->attach([
            $ram8->id,
            $storage128->id,
        ]);
    }
}
