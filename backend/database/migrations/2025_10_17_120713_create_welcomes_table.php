<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('welcomes', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->default('tr');
            $table->json('image'); // {url, alt, width, height}
            $table->json('gradient'); // {from, via, to}
            $table->timestamps();

            $table->unique('locale');
        });
    }

    public function down()
    {
        Schema::dropIfExists('welcomes');
    }
};
