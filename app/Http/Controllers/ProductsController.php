<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Source\ProductModification;
use Exception;

class ProductsController extends Controller
{
    public function product($id)
    {
        $productType = ProductType::where('id', $id)->firstOrFail();

        $productModification = new ProductModification($productType);
        $init_modification = $productModification->getFirstModification();

        $productModification->distributeAttributes();

        return view('pages.product', [
            'productType' => $productType,
            'init_modification' => $init_modification,
            'various_attributes' => $productModification->getVariousAttributes(),
            'static_attributes' => $productModification->getStaticAttributes(),
            'type_attributes' => $productType->getCommonAttributes(),
        ]);
    }

    public function productChange(Request $request)
    {
        $productType = ProductType::where('id', $request->get('product_type'))->first();

        $productModification = new ProductModification($productType);
        $productModification->distributeAttributes();

        try {
            $modification = $productModification->searchModification(
                $request->get('product_id'),
                $request->get('attr_value_id')
            );
        } catch (Exception $e) {

            return response()->json(array(
                'success' => false,
                'error' => $e->getMessage()
            ), 400);
        }

        $modification_view = view("pages._product-modification", [
            'productType' => $productType,
            'modification' => $modification,
            'various_attributes' => $productModification->getVariousAttributes(),
            'static_attributes' => $productModification->getStaticAttributes(),
            'type_attributes' => $productType->getCommonAttributes(),
        ])->render();

        return response()->json(['modification_view' => $modification_view]);
    }
}
