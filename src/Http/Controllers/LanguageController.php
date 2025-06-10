<?php

namespace Palgoals\TranslationManager\Http\Controllers;

use Palgoals\TranslationManager\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::paginate(10);
        return view('translation-manager::languages.index', compact('languages'));
    }

    public function create()
    {
        return view('translation-manager::languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'native' => 'required|string|max:255',
            'code'   => 'required|string|max:10|unique:languages,code',
            'flag'   => 'nullable|string|max:255',
        ]);

        Language::create([
            'name'      => $request->name,
            'native'    => $request->native,
            'code'      => strtolower($request->code),
            'flag'      => $request->flag,
            'is_rtl'    => $request->has('is_rtl'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('dashboard.languages.index')->with('success', 'Language added successfully!');
    }

    public function edit(Language $language)
    {
        return view('translation-manager::languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'native' => 'required|string|max:255',
            'code'   => 'required|string|max:10|unique:languages,code,' . $language->id,
            'flag'   => 'nullable|string|max:255',
        ]);

        $language->update([
            'name'      => $request->name,
            'native'    => $request->native,
            'code'      => strtolower($request->code),
            'flag'      => $request->flag,
            'is_rtl'    => $request->has('is_rtl'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('dashboard.languages.index')->with('success', 'Language updated successfully!');
    }

    public function toggleRtl(Language $language, Request $request)
    {
        $language->is_rtl = $request->boolean('is_rtl');
        $language->save();

        return response()->json(['success' => true]);
    }

    public function toggleStatus(Language $language, Request $request)
    {
        $language->is_active = $request->boolean('is_active');
        $language->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Language $language)
    {
        try {
            $language->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
