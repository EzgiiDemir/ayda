<?php
// database/migrations/2025_10_02_140000_create_or_update_treatments_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('treatments')) {
            Schema::create('treatments', function (Blueprint $t) {
                $t->id();
                $t->string('slug')->unique();
                $t->json('title');
                $t->json('excerpt')->nullable();
                $t->json('content')->nullable();      // HTML
                $t->json('sections')->nullable();     // [{heading, html}]
                $t->string('hero_image')->nullable();
                $t->json('meta_title')->nullable();
                $t->json('meta_description')->nullable();
                $t->integer('position')->default(0);
                $t->boolean('published')->default(true);
                $t->timestamps();
            });
        } else {
            Schema::table('treatments', function (Blueprint $t) {
                foreach ([
                             'title'=>'json','excerpt'=>'json','content'=>'json','sections'=>'json',
                             'hero_image'=>'string','meta_title'=>'json','meta_description'=>'json',
                             'position'=>'integer','published'=>'boolean'
                         ] as $col=>$type) {
                    if (!Schema::hasColumn('treatments',$col)) {
                        match($type){
                            'json'   => $t->json($col)->nullable(),
                            'string' => $t->string($col)->nullable(),
                            'integer'=> $t->integer($col)->default(0),
                            'boolean'=> $t->boolean($col)->default(true),
                        };
                    }
                }
            });
        }
    }
    public function down(): void {
        if (Schema::hasTable('treatments')) {
            Schema::table('treatments', function (Blueprint $t) {
                foreach (['excerpt','content','sections','hero_image','meta_title','meta_description','position','published'] as $c) {
                    if (Schema::hasColumn('treatments',$c)) $t->dropColumn($c);
                }
            });
        }
    }
};
