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
        Schema::create('request_type_approvers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_type_id')->default(NULL);
            $table->unsignedBigInteger('user_id')->default(NULL);
            $table->unsignedBigInteger('request_type_status_id')->default(NULL);
            $table->text('hash')->default(NULL);
            $table->integer('level')->default(0)->comment('hierarchy: 1, 2 ,3');
            $table->boolean('is_active')->default(1);
            $table->text('modified_by')->default(NULL);
            $table->timestamps();

            $table->foreign('request_type_id')->references('id')->on('request_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('request_type_status_id')->references('id')->on('request_type_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_type_approvers');
    }
};
