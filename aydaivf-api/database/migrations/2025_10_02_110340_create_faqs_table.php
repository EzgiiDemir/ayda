<?php
// database/migrations/2025_10_02_120000_create_faqs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('faqs', function (Blueprint $t) {
            $t->id();
            $t->json('category')->nullable();   // {"tr":"Genel","en":"General"}
            $t->json('question');               // {"tr":"...?","en":"...?"}
            $t->json('answer');                 // {"tr":"<p>...</p>","en":"<p>...</p>"}
            $t->unsignedInteger('position')->default(0);
            $t->boolean('published')->default(true);
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('faqs');
    }
};
