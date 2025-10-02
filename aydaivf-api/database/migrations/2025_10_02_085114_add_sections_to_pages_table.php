<?php
// database/migrations/2025_10_02_085114_add_sections_to_pages_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'sections')) {
                $table->json('sections')->nullable()->after('content');
            }
            if (!Schema::hasColumn('pages', 'hero_image')) {
                $table->string('hero_image')->nullable()->after('content');
            }
        });
    }

    public function down(): void {
        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'sections')) {
                $table->dropColumn('sections');
            }
            if (Schema::hasColumn('pages', 'hero_image')) {
                $table->dropColumn('hero_image');
            }
        });
    }
};
