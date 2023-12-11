<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
    
            // Set a flash message to indicate successful language change
            session()->flash('success', __('dashboard.language-changed'));
        } else {
            // Set a flash message for an invalid language selection
            session()->flash('error', __('dashboard.invalid-lang'));
        }
    
        return redirect()->back();
    }
}
