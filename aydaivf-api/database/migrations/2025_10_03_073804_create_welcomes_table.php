<?php
// database/migrations/2025_10_03_000001_create_welcomes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('welcomes', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->index();          // tr | en
            $table->string('subtitle')->nullable();        // "Ayda-Tüp Bebek Web Sitesine"
            $table->string('title')->nullable();           // "Hoş Geldiniz"
            $table->longText('content')->nullable();       // Zengin HTML
            $table->string('image')->nullable();           // /uploads/..png
            $table->string('ceo_name')->nullable();        // "Tanyel FELEK, MS"
            $table->string('ceo_title')->nullable();       // alt unvan
            $table->timestamps();
            $table->unique(['locale']);
        });
    }
    public function down(): void { Schema::dropIfExists('welcomes'); }
};
