<?php
// database/migrations/2025_10_02_171000_create_why_us_items_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('why_us_items', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('locale', 2)->default('tr'); // tr|en
            $t->json('title')->nullable();          // {"tr":"...", "en":"..."}
            $t->json('text')->nullable();           // {"tr":"...", "en":"..."} (HTML serbest)
            $t->string('image');                    // /uploads/...
            $t->string('aspect')->default('16/9');  // CSS aspect-ratio değeri
            $t->unsignedInteger('max_height')->nullable();
            $t->unsignedInteger('position')->default(0);
            $t->boolean('published')->default(true);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('why_us_items'); }
};
