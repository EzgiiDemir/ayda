<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            if (!Schema::hasColumn('heroes', 'background')) {
                $table->string('background')->nullable()->after('id');
            }
            if (!Schema::hasColumn('heroes', 'dots')) {
                $table->string('dots')->nullable()->after('background');
            }
            if (!Schema::hasColumn('heroes', 'footerText')) {
                $table->string('footerText')->nullable()->after('dots');
            }
            if (!Schema::hasColumn('heroes', 'locale')) {
                $table->string('locale', 5)->default('tr')->after('footerText');
            }
            if (!Schema::hasColumn('heroes', 'subtitle')) {
                $table->string('subtitle')->nullable()->after('locale');
            }
            if (!Schema::hasColumn('heroes', 'title')) {
                $table->string('title')->nullable()->after('subtitle');
            }
            if (!Schema::hasColumn('heroes', 'workhours')) {
                $table->string('workhours')->nullable()->after('title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn([
                'background',
                'dots',
                'footerText',
                'locale',
                'subtitle',
                'title',
                'workhours',
            ]);
        });
    }
};
