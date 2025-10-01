<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('treatments_sections', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5); // tr | en
            $table->string('title');
            $table->string('subtitle');
            $table->text('intro')->nullable();
            $table->text('intro2')->nullable();
            $table->string('background')->nullable(); // /images/logoonly.svg gibi
            $table->json('treatments')->nullable();   // [{label, slug}]
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('treatments_sections');
    }
};
