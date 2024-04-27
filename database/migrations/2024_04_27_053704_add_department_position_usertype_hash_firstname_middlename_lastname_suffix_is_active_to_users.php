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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->default(NULL)->after('id');
            $table->unsignedBigInteger('position_id')->default(NULL)->after('department_id');
            $table->unsignedBigInteger('user_type_id')->default(NULL)->after('position_id');
            $table->text('hash')->default(NULL)->after('user_type_id');
            $table->text('firstname')->default(NULL)->after('hash');
            $table->text('middlename')->default(NULL)->after('firstname');
            $table->text('lastname')->default(NULL)->after('middlename');
            $table->text('suffix')->default(NULL)->after('lastname');
            $table->boolean('is_active')->default(1)->after('suffix');
            $table->text('modified_by')->default(NULL)->after('is_active');

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
