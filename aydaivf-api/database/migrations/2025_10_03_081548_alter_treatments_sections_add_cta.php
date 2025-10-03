<?php
// database/migrations/2025_10_03_081500_alter_treatments_sections_add_cta.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('treatments_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('treatments_sections', 'cta_text')) {
                $table->string('cta_text')->nullable()->after('background');
            }
            if (!Schema::hasColumn('treatments_sections', 'cta_link')) {
                $table->string('cta_link')->nullable()->after('cta_text');
            }
            if (!Schema::hasColumn('treatments_sections', 'treatments')) {
                $table->json('treatments')->nullable()->after('cta_link');
            }
        });
    }

    public function down(): void
    {
        Schema::table('treatments_sections', function (Blueprint $table) {
            if (Schema::hasColumn('treatments_sections', 'cta_text')) {
                $table->dropColumn('cta_text');
            }
            if (Schema::hasColumn('treatments_sections', 'cta_link')) {
                $table->dropColumn('cta_link');
            }
            // `treatments` kolonu muhtemelen zaten var; varsa geri almıyoruz.
        });
    }
};
