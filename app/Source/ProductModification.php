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
     * Unique $productType attributes
     *
     * @var array
     */
    private $unique_modifications = [];

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
        foreach ($this->modifications as $modification) {
            if (isset($this->unique_modifications[$modification['value_id']])) {
                $this->common_modifications[$modification['value_id']] = $modification;
            } else {
                $this->unique_modifications[$modification['value_id']] = $modification;
            }
        }

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
        return array_diff_key($this->unique_modifications, $this->common_modifications);
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
}