<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('treatments', function (Blueprint $table) {
                    if (!Schema::hasColumn('treatments', 'image')) {
                        $table->string('image', 512)->nullable()->after('content');
                    }
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('treatments', function (Blueprint $table) {
                 if (Schema::hasColumn('treatments', 'image')) {
                     $table->dropColumn('image');
                 }
             });
    }
}
