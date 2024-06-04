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
        Schema::create('request_update_logs', function (Blueprint $table) {
            $table->id();
            $table->text('hash');
            $table->unsignedBigInteger('request_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->text('modified_by');
            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('request_type_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_update_logs');
    }
};
