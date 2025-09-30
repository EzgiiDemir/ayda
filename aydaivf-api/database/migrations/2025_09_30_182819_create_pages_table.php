<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();                 // "hakkimizda", "tedaviler/tupbebekivf"
            $t->json('title');                            // {"tr":"...", "en":"..."}
            $t->json('content')->nullable();              // {"tr":"<p>...</p>", "en":"..."}
            $t->json('sections')->nullable();             // opsiyonel: [{id,heading,text}] çok dilli gerekirse {"tr":[...],"en":[...]}
            $t->json('seo')->nullable();
            $t->boolean('published')->default(true);
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
