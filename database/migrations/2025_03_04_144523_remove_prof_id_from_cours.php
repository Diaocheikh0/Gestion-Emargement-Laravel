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
        Schema::table('cours', function (Blueprint $table) {
            $table->dropForeign(['prof_id']);
            $table->dropColumn('prof_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            $table->unsignedBigInteger('prof_id')->nullable();
            $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
