<?php

use Palgoals\TranslationManager\Models\TranslationValue;

if (!function_exists('t')) {
    function t($key, $default = null)
    {
        $locale = app()->getLocale();
        $fallbackLocale = config('app.fallback_locale', 'en');
        $cacheKey = "translation.{$locale}.{$key}";

        $value = cache()->remember($cacheKey, 60, function () use ($key, $locale, $default) {
            $translation = TranslationValue::where('key', $key)
                ->where('locale', $locale)
                ->first();

            if (!$translation && config('app.translation_auto_create', true)) {
                TranslationValue::create([
                    'key'    => $key,
                    'locale' => $locale,
                    'value'  => $default ?? '',
                ]);
            }

            return $translation?->value;
        });

        if ($value !== null) {
            return $value;
        }

        if ($locale !== $fallbackLocale) {
            $fallbackCacheKey = "translation.{$fallbackLocale}.{$key}";

            $fallbackValue = cache()->remember($fallbackCacheKey, 60, function () use ($key, $fallbackLocale, $default) {
                $translation = TranslationValue::where('key', $key)
                    ->where('locale', $fallbackLocale)
                    ->first();

                if (!$translation && config('app.translation_auto_create', true)) {
                    TranslationValue::create([
                        'key'    => $key,
                        'locale' => $fallbackLocale,
                        'value'  => $default ?? '',
                    ]);
                }

                return $translation?->value;
            });

            if ($fallbackValue !== null) {
                return $fallbackValue;
            }
        }

        return $default ?? $key;
    }
}
