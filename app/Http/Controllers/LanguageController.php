<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application locale.
     *
     * @param  string  $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLang($lang)
    {
        $availableLocales = ['en', 'fr', 'ar'];

        if (in_array($lang, $availableLocales)) {
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}
