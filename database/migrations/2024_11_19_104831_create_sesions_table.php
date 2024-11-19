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
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->string("spots")->default(5);
            $table->string("start");
            $table->string("end");
            $table->boolean("available")->default(false);
            $table->boolean("is_premium")->default(false);
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesions');
    }
};
