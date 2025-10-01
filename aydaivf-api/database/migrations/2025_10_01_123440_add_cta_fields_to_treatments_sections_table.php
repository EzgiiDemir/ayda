<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('treatments_sections', function (Blueprint $table) {
            $table->string('ctaLink')->nullable()->after('intro2');
            $table->string('ctaText')->nullable()->after('ctaLink');
        });
    }

    public function down(): void
    {
        Schema::table('treatments_sections', function (Blueprint $table) {
            $table->dropColumn(['ctaLink', 'ctaText']);
        });
    }
};
