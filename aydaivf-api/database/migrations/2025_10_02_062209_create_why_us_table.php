<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('why_us', function (Blueprint $t) {
            $t->id();
            $t->string('slug');          // ör: why-us
            $t->string('locale', 5);     // tr | en
            $t->string('image');         // tam url ya da /uploads/..
            $t->string('aspect')->default('16/7'); // "16/7", "16/5" vb.
            $t->unsignedSmallInteger('max_height')->nullable(); // px
            $t->timestamps();
            $t->unique(['slug','locale']);
        });
    }
    public function down(): void { Schema::dropIfExists('why_us'); }
};
