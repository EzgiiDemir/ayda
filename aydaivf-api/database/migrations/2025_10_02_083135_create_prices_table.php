<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();                  // ör: ivf-icsi
            $table->json('name');                              // {"tr":"Tüp Bebek (IVF) - ICSI","en":"IVF - ICSI"}
            $table->json('note')->nullable();                  // {"tr":"*İlaçlar hariç","en":"*Excludes meds"}
            $table->string('currency', 3)->default('EUR');     // EUR, USD, TRY
            $table->decimal('amount', 10, 2);                  // 3500.00
            $table->string('unit')->nullable();                // "per cycle" gibi
            $table->unsignedInteger('position')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();

            $table->index(['published', 'position']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('prices');
    }
};
