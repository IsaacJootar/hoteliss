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
        Schema::create('reports_upload_files', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id');
            $table->string('file_name');
            $table->string('path');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->string('random_name');
            $table->integer('sent_by');
            $table->integer('sent_to');
            $table->Integer('user_id');
            $table->string('section');
            $table->timestamps();
        });
    }








    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports_upload_files');
    }
};
