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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->default(NULL);
            $table->unsignedBigInteger('request_type_id')->default(NULL);
            $table->unsignedBigInteger('user_id')->default(NULL)->comment('requested by');
            $table->unsignedBigInteger('assigned_user_id')->default(NULL)->comment('assigned personnel to do the request.');
            $table->text('hash')->default(NULL);
            $table->text('reference_number')->default(NULL);
            $table->text('details')->default(NULL);
            $table->float('cost')->default(NULL);
            $table->boolean('is_active')->default(1);
            $table->text('modified_by')->default(NULL);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('request_type_id')->references('id')->on('request_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('assigned_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
