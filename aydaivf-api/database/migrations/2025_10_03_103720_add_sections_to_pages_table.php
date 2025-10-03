<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'sections')) {
                $table->json('sections')->nullable()->after('content');
            }
            if (!Schema::hasColumn('pages', 'published')) {
                $table->boolean('published')->default(true)->after('sections');
            }
        });
    }
    public function down(): void {
        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'sections')) $table->dropColumn('sections');
            if (Schema::hasColumn('pages', 'published')) $table->dropColumn('published');
        });
    }
};
