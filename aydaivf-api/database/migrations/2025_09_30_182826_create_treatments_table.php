<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();                 // "tedaviler/tupbebekivf"
            $t->json('title');
            $t->json('content')->nullable();
            $t->json('meta')->nullable();
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
        Schema::dropIfExists('treatments');
    }
}
