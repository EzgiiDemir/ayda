<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('locale', 2)->default('tr');
            $table->string('background_logo')->nullable();
            $table->json('treatments');
            $table->timestamps();
            $table->unique('locale');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
