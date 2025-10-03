<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('footers', function (Blueprint $table) {
            // add-if-missing helper
            $add = function(string $col, callable $cb) use ($table) {
                if (!Schema::hasColumn('footers', $col)) { $cb($table); }
            };

            $add('address_icon',   fn($t) => $t->string('address_icon')->nullable());
            $add('address_title',  fn($t) => $t->string('address_title')->nullable());
            $add('address_text',   fn($t) => $t->text('address_text')->nullable());

            $add('contact_icon',   fn($t) => $t->string('contact_icon')->nullable()); // <-- eksik olan
            $add('contact_title',  fn($t) => $t->string('contact_title')->nullable());
            $add('phone',          fn($t) => $t->string('phone')->nullable());
            $add('email',          fn($t) => $t->string('email')->nullable());

            $add('socials',        fn($t) => $t->json('socials')->nullable());
            $add('quicklinks',     fn($t) => $t->json('quicklinks')->nullable());

            $add('copyright',      fn($t) => $t->string('copyright')->nullable());

            // daha önce eklediğimiz rozet alanları:
            $add('address_badge',  fn($t) => $t->string('address_badge')->nullable());
            $add('footer_badge',   fn($t) => $t->longText('footer_badge')->nullable());
        });
    }

    public function down(): void
    {
        Schema::table('footers', function (Blueprint $table) {
            $drop = function(string $col) {
                if (Schema::hasColumn('footers', $col)) {
                    Schema::table('footers', fn(Blueprint $t) => $t->dropColumn($col));
                }
            };
            foreach ([
                         'address_icon','address_title','address_text',
                         'contact_icon','contact_title','phone','email',
                         'socials','quicklinks','copyright',
                         'address_badge','footer_badge',
                     ] as $c) { $drop($c); }
        });
    }
};
