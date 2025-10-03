<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();

            // Çok dilliler (JSON)
            $table->json('address_title')->nullable();   // {tr:"Adresimiz", en:"Address"}
            $table->json('address_text')->nullable();    // {tr:"...", en:"..."}
            $table->json('contact_title')->nullable();   // {tr:"İletişim", en:"Contact"}
            $table->json('copyright')->nullable();       // {tr:"© 2025 ...", en:"© 2025 ..."}

            // İkonlar / görseller
            $table->string('address_icon')->nullable();
            $table->string('contact_icon')->nullable();
            $table->string('address_badge')->nullable(); // /uploads/iso1.png
            $table->string('quicklinks_icon')->nullable();
            $table->string('footer_badge')->nullable();  // alt bant logosu

            // İletişim
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // JSON içerikler
            $table->json('socials')->nullable();         // [{platform,url,icon}]
            $table->json('quicklinks')->nullable();      // [{label,href}]

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('footer_settings');
    }
};
