<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('showcases', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5);
            $table->string('image'); // showcase.png benzeri resim
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('showcases');
    }
};
