<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasColumn('menus', 'key')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->string('key')->nullable()->after('slug');
            });
        }
    }
    public function down(): void {
        if (Schema::hasColumn('menus', 'key')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->dropColumn('key');
            });
        }
    }
};
