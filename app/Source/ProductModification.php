<?php

namespace App\Source;

use App\Models\ProductType;

class ProductModification
{
    /**
     * ProductType instance
     *
     * @var ProductType
     */
    private $productType;

    /**
     * Variations of $productType attributes
     *
     * @var array
     */
    private $modifications = [];

    /**
     * Various $productType attributes
     *
     * @var array
     */
    private $various_modifications = [];

    /**
     * Common $productType attributes
     *
     * @var array
     */
    private $common_modifications = [];

    /**
     * Constructor
     *
     * @param ProductType $productType
     */
    public function __construct(ProductType $productType)
    {
        $this->productType = $productType;
        $this->modifications = $this->productType->getFullProductModifications()->toArray();
    }

    /**
     * Distribute $productType attributes by attribute_value
     * for common and unique
     *
     * @return ProductModification
     */
    public function distributeAttributes():ProductModification
    {
        $single_entry = [];
        $few_entries = [];

        foreach ($this->modifications as $outer) {
            $counter = 0;
            foreach ($this->modifications as $inner) {
                if ($outer['value_id'] === $inner['value_id']) {
                    $counter++;
                }
            }
            if ($counter === 1) {
                $single_entry[$outer['value_id']] = $outer;
            } elseif ($counter > 1) {
                $few_entries[$outer['value_id']] = $outer;
            }
        }

        foreach ($few_entries as $few) {
            foreach ($single_entry as $single) {
                if ($few['attribute_id'] === $single['attribute_id']) {
                    $single_entry[$few['value_id']] = $few;
                    unset($few_entries[$few['value_id']]);
                    break;
                }
            }
        }

        ksort($single_entry);
        $this->common_modifications = $few_entries;
        $this->various_modifications = $single_entry;

        return $this;
    }

    /**
     * Get first modification to init page with
     *
     * @return array
     */
    public function getFirstModification():array
    {
        return $this->modifications[array_key_first($this->modifications)];
    }

    /**
     * Get various attributes for form
     *
     * @return array
     */
    public function getVariousAttributes():array
    {
        return $this->various_modifications;
    }

    /**
     * Get static attributes for table
     *
     * @return array
     */
    public function getStaticAttributes():array
    {
        return $this->common_modifications;
    }

    /**
     * Search modification selected by user
     *
     * @param $product_id
     * @param $attribute_value_id
     * @return array
     * @throws \Exception
     */
    public function searchModification($product_id, $attribute_value_id):array
    {
        foreach ($this->modifications as $modification) {
            if ($modification['product_id'] == $product_id and
                $modification['value_id'] == $attribute_value_id) {

                return $modification;
            }
        }

        throw new \Exception('Product Modification not found');
    }
}
