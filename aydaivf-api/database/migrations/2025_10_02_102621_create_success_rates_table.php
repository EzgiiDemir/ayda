<?php
// database/migrations/2025_10_02_130000_create_success_rates_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('success_rates', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->json('name');                 // {tr,en}
            $table->string('group_key')->index(); // ör: ivf, donation, male
            $table->json('group_title')->nullable(); // {tr,en}
            $table->decimal('rate', 5, 2)->nullable(); // 0-100
            $table->string('unit', 16)->default('%');
            $table->json('note')->nullable();     // {tr,en}
            $table->integer('position')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('success_rates');
    }
};
