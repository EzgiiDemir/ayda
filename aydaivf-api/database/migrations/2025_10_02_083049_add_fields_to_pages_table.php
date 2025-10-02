<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'slug')) {
                $table->string('slug')->unique()->after('id');
            }
            if (!Schema::hasColumn('pages', 'title')) {
                $table->json('title')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('pages', 'content')) {
                $table->json('content')->nullable()->after('title');
            }
            if (!Schema::hasColumn('pages', 'meta_title')) {
                $table->json('meta_title')->nullable()->after('content');
            }
            if (!Schema::hasColumn('pages', 'meta_description')) {
                $table->json('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('pages', 'hero_image')) {
                $table->string('hero_image')->nullable()->after('meta_description');
            }
        });
    }

    public function down(): void {
        Schema::table('pages', function (Blueprint $table) {
            foreach (['hero_image','meta_description','meta_title','content','title','slug'] as $col) {
                if (Schema::hasColumn('pages', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
