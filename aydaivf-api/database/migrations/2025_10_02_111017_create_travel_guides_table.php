<?php
// database/migrations/2025_10_02_150000_create_travel_guides_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('travel_guides', function (Blueprint $t) {
            $t->id();
            $t->json('category')->nullable(); // {"tr":"Ulaşım","en":"Transport"}
            $t->json('title');                // {"tr":"Ercan Havalimanı","en":"Ercan Airport"}
            $t->json('html');                 // {"tr":"<p>...</p>","en":"<p>...</p>"}
            $t->string('icon')->nullable();   // /uploads/..svg|png
            $t->string('link')->nullable();   // external/internal
            $t->unsignedInteger('position')->default(0);
            $t->boolean('published')->default(true);
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('travel_guides');
    }
};
