<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function changeLanguage(): RedirectResponse
    {
        $currentLocale = app()->currentLocale();
        $newLocale = $currentLocale === 'es' ? 'en' : 'es';

        session()->put('locale', $newLocale);

        return back();
    }
}
