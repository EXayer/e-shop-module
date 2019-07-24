<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Source\ProductModification;

class ProductsController extends Controller
{
    public function product($id)
    {
        $productType = ProductType::where('id', $id)->firstOrFail();

        //dd($productType->getFullProductModifications());

        $productModification = new ProductModification($productType);
        $init_modification = $productModification->getFirstModification();

        $productModification->distributeAttributes();
        $various_attributes = $productModification->getVariousAttributes();
        $static_attributes = $productModification->getStaticAttributes();
        //dd($init_modification);

        return view('pages.product', [
            'productType' => $productType,
            'init_modification' => $init_modification,
            'various_attributes' => $various_attributes,
            'static_attributes' => $static_attributes,
        ]);
    }
}
