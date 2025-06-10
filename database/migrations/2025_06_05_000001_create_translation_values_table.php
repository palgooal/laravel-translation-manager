<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('translation_values', function (Blueprint $table) {
            $table->id();
            $table->string('key', 150);
            $table->string('group', 50)->default('frontend');
            $table->string('locale', 10);
            $table->text('value');
            $table->timestamps();

            $table->unique(['key', 'group', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translation_values');
    }
};
