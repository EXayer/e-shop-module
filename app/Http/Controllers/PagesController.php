<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function front()
    {
        return view('pages.front');
    }

    public function productTypes()
    {
        return view('pages.product-types', [

        ]);
    }
}
