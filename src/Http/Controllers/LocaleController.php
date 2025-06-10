<?php

namespace Palgoals\TranslationManager\Http\Controllers;

use Palgoals\TranslationManager\Models\Language;
use Palgoals\TranslationManager\Models\TranslationValue;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LocaleController extends Controller
{
    public function change($locale)
    {
        $language = Language::where('code', $locale)->where('is_active', true)->first();

        if ($language) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }

    public function translateJson($locale)
    {
        $translations = TranslationValue::where('locale', $locale)->pluck('value', 'key');

        return response()->json($translations);
    }
}
