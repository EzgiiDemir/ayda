<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->index(); // tr | en
            $table->string('address_title')->nullable();
            $table->text('address_text')->nullable();
            $table->string('address_icon')->nullable();
            $table->string('address_image')->nullable();

            $table->string('contact_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->json('socials')->nullable(); // facebook, instagram, youtube

            $table->string('quicklinks_title')->nullable();
            $table->json('quicklinks')->nullable(); // [{label, href}]

            $table->string('copyright')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('footers');
    }
};
