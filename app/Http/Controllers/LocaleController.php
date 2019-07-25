<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setLocale(Request $request)
    {
        $lang = $request->has('lang') ? $request->get('lang') : 'en';

        Session::put('locale', $lang);

        return redirect()->back();
    }
}
