<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->default('tr');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('background')->nullable();
            $table->string('dots')->nullable();
            $table->string('workhours')->nullable();
            $table->string('footerText')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
