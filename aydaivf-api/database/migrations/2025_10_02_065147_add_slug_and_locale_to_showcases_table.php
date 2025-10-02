<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('showcases', function (Blueprint $t) {
            if (!Schema::hasColumn('showcases','slug'))   $t->string('slug')->after('id');
            if (!Schema::hasColumn('showcases','locale')) $t->string('locale',5)->after('slug');
            if (!Schema::hasColumn('showcases','image'))  $t->string('image')->nullable()->after('locale');
            if (!Schema::hasColumn('showcases','aspect')) $t->string('aspect')->nullable()->after('image');
            if (!Schema::hasColumn('showcases','max_height')) $t->unsignedSmallInteger('max_height')->nullable()->after('aspect');

            $t->unique(['slug','locale'],'showcases_slug_locale_unique');
        });
    }
    public function down(): void {
        Schema::table('showcases', function (Blueprint $t) {
            $t->dropUnique('showcases_slug_locale_unique');
            $t->dropColumn(['slug','locale','image','aspect','max_height']);
        });
    }
};
