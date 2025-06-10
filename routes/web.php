<?php

use Illuminate\Support\Facades\Route;
use Palgoals\TranslationManager\Http\Controllers\TranslationValueController;

Route::middleware(['web', 'auth'])->prefix('admin/translation-values')->name('dashboard.translation-values.')->group(function () {
    Route::get('/', [TranslationValueController::class, 'index'])->name('index');
    Route::get('create', [TranslationValueController::class, 'create'])->name('create');
    Route::post('/', [TranslationValueController::class, 'store'])->name('store');
    Route::get('{key}/edit', [TranslationValueController::class, 'edit'])->name('edit');
    Route::put('{key}', [TranslationValueController::class, 'update'])->name('update');
    Route::delete('{key}', [TranslationValueController::class, 'destroy'])->name('destroy');
    Route::get('export', [TranslationValueController::class, 'export'])->name('export');
    Route::post('import', [TranslationValueController::class, 'import'])->name('import');
});
