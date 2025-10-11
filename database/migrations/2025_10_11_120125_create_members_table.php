<?php

use App\Enums\Enums\MemberStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email_target');
            $table->string('email_nick')->nullable();
            $table->string('email_full')->nullable();
            $table->string('libera_nick')->nullable();
            $table->string('libera_cloak')->nullable();
            $table->string('libera_cloak_applied')->nullable();
            $table->string('status')->default(MemberStatus::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
