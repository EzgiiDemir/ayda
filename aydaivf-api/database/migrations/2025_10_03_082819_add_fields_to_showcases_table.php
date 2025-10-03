<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('showcases', function (Blueprint $table) {
            $table->string('image', 1024)->change();        // uzun URL için genişletildi
            $table->unsignedInteger('position')->default(1)->after('image');
            $table->boolean('published')->default(true)->index()->after('position');
        });
    }

    public function down(): void {
        Schema::table('showcases', function (Blueprint $table) {
            $table->string('image')->change();
            $table->dropColumn(['position', 'published']);
        });
    }
};
