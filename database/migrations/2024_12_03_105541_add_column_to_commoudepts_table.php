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
        Schema::table('commoudepts', function (Blueprint $table) {
            $table->unsignedBigInteger("arrondissement_id")->nullable();
            $table->foreign("arrondissement_id")->references("id")->on("arrondissements")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commoudepts', function (Blueprint $table) {
            //
        });
    }
};
