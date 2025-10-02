<?php
// database/migrations/2025_10_02_160500_create_contact_messages_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contact_messages', function (Blueprint $t) {
            $t->id();
            $t->string('locale',2)->default('tr');
            $t->string('name');
            $t->string('email');
            $t->string('phone')->nullable();
            $t->string('subject')->nullable();
            $t->text('message');
            $t->string('status',20)->default('new');
            $t->string('ip')->nullable();
            $t->text('user_agent')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('contact_messages'); }
};
