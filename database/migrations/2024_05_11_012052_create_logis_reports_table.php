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
        Schema::create('logis_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('trips_made');
            $table->integer('airport_pickups');
            $table->integer('breakdowns');
            $table->integer('other');
            $table->text('note')->nullable();
            $table->string('report_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logis_reports');
    }
};
