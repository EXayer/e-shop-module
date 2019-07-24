<?php

namespace App\Http\Controllers;

class PagesController
{
    public function front()
    {
        return view('pages.front');
    }

    public function productTypes()
    {
        return view('pages.product-types');
    }
}
