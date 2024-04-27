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
        Schema::create('request_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->default(NULL);
            $table->unsignedBigInteger('category_id')->default(NULL);
            $table->text('hash')->default(NULL);
            $table->text('name')->default(NULL);
            $table->boolean('is_active')->default(1);
            $table->text('modified_by')->default(NULL);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_types');
    }
};
