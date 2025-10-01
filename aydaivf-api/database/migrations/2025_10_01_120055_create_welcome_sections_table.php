<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelcomeSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_sections', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->default('tr'); // tr | en
            $table->string('image')->nullable();        // https://api.aydaivf.com/uploads/xxx.png
            $table->string('title')->nullable();        // Hoş Geldiniz
            $table->string('subtitle')->nullable();     // Ayda-Tüp Bebek Web Sitesine
            $table->longText('content')->nullable();    // HTML / Rich Text
            $table->string('ceo_name')->nullable();     // Tanyel FELEK
            $table->string('ceo_title')->nullable();    // Direktör & Embriyoloji...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_sections');
    }
}
