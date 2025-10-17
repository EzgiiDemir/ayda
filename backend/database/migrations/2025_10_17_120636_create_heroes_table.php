<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->default('tr');
            $table->json('slides'); // [{image: {url, alt}, title, subtitle}]
            $table->string('dots_pattern')->nullable();
            $table->boolean('auto_play')->default(true);
            $table->integer('auto_play_interval')->default(5000);
            $table->boolean('show_indicators')->default(true);
            $table->timestamps();

            $table->unique('locale');
        });
    }

    public function down()
    {
        Schema::dropIfExists('heroes');
    }
};
