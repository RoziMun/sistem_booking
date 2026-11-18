<?php

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
        Schema::create('view_webs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idKost")->constrained('kosts');
            $table->foreignId("idUsers")->constrained('users');
            $table->timestamp("visited_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_webs');
    }
};
