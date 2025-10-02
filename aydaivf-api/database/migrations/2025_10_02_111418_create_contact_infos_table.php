<?php
// database/migrations/2025_10_02_160000_create_contact_infos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contact_infos', function (Blueprint $t) {
            $t->id();
            $t->json('address_title')->nullable(); // {"tr":"Adres","en":"Address"}
            $t->json('address_text')->nullable();  // {"tr":"...", "en":"..."}
            $t->json('workhours')->nullable();     // {"tr":"PTESİ - CUMA : 9:00 - 14:00", "en":"MON - FRI : 9:00 - 14:00"}
            $t->string('phone')->nullable();
            $t->string('email')->nullable();
            $t->string('whatsapp_url')->nullable();
            $t->json('socials')->nullable();       // [{platform,url,icon}]
            $t->string('map_url')->nullable();     // Google Maps link
            $t->text('map_embed')->nullable();     // <iframe ...>
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('contact_infos'); }
};
