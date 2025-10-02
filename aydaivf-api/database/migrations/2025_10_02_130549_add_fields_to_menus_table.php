<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('menus', function (Blueprint $table) {
            if (!Schema::hasColumn('menus', 'slug')) {
                $table->string('slug')->unique()->after('id');
            }
            if (!Schema::hasColumn('menus', 'brand')) {
                $table->string('brand')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('menus', 'brand_logo')) {
                $table->string('brand_logo')->nullable()->after('brand');
            }
            if (!Schema::hasColumn('menus', 'items')) {
                $table->json('items')->after('brand_logo');
            }
            if (!Schema::hasColumn('menus', 'colors')) {
                $table->json('colors')->nullable()->after('items');
            }
            if (!Schema::hasColumn('menus', 'whatsapp_url')) {
                $table->string('whatsapp_url')->nullable()->after('colors');
            }
        });
    }

    public function down(): void {
        Schema::table('menus', function (Blueprint $table) {
            foreach (['slug','brand','brand_logo','items','colors','whatsapp_url'] as $col) {
                if (Schema::hasColumn('menus', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
