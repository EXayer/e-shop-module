<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\AttributeValueTranslate;
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
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $golden->id,
            'value' => 'Golden'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $golden->id,
            'value' => 'Золотистый'
        ]);

        $silver = AttributeValue::create([
            'attribute_id' => $attr_color->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $silver->id,
            'value' => 'Silver'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $silver->id,
            'value' => 'Серебряный'
        ]);

        $grey = AttributeValue::create([
            'attribute_id' => $attr_color->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $grey->id,
            'value' => 'Grey'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $grey->id,
            'value' => 'Серый'
        ]);

        // Attribute 'RAM'
        $attr_ram = Attribute::create([
            'title' => 'RAM'
        ]);

        $ram4 = AttributeValue::create([
            'attribute_id' => $attr_ram->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $ram4->id,
            'value' => '4GB'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $ram4->id,
            'value' => '4Гб'
        ]);

        $ram8 = AttributeValue::create([
            'attribute_id' => $attr_ram->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $ram8->id,
            'value' => '8GB'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $ram8->id,
            'value' => '8Гб'
        ]);

        $ram16 = AttributeValue::create([
            'attribute_id' => $attr_ram->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $ram16->id,
            'value' => '16GB'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $ram16->id,
            'value' => '16Гб'
        ]);

        // Attribute 'Storage'
        $attr_storage = Attribute::create([
            'title' => 'Storage'
        ]);

        $storage64 = AttributeValue::create([
            'attribute_id' => $attr_storage->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $storage64->id,
            'value' => '64GB'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $storage64->id,
            'value' => '64Гб'
        ]);

        $storage128 = AttributeValue::create([
            'attribute_id' => $attr_storage->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $storage128->id,
            'value' => '128GB'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $storage128->id,
            'value' => '128Гб'
        ]);

        $storage256 = AttributeValue::create([
            'attribute_id' => $attr_storage->id,
        ]);

        AttributeValueTranslate::create([
            'language_id' => 1,
            'attribute_value_id' => $storage256->id,
            'value' => '256GB'
        ]);

        AttributeValueTranslate::create([
            'language_id' => 2,
            'attribute_value_id' => $storage256->id,
            'value' => '256Гб'
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
            $grey->id,
            $ram16->id,
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
            $golden->id,
            $ram8->id,
            $storage128->id,
        ]);
    }
}
