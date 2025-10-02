<?php
// database/migrations/2025_10_02_120000_create_team_members_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->json('name');
            $table->json('role')->nullable();
            $table->json('bio')->nullable();
            $table->string('image')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('team_members');
    }
};
