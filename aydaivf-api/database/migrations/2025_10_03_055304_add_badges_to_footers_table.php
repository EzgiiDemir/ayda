<?php
// database/migrations/2025_10_02_150000_add_badges_to_footers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('address_badge')->nullable()->after('address_text');
            $table->longText('footer_badge')->nullable()->after('copyright'); // URL ya da data:
        });
    }
    public function down(): void {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn(['address_badge','footer_badge']);
        });
    }
};
