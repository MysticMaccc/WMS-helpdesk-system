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
        Schema::create('request_type_statuses', function (Blueprint $table) {
            $table->id();
            $table->text('hash')->default(NULL);
            $table->text('name')->default(NULL)->comment('start, approve, disapprove, close, etc..');
            $table->boolean('is_active')->default(1);
            $table->text('modified_by')->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_type_statuses');
    }
};
