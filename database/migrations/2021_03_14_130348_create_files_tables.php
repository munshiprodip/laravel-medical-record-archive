<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_name', 100)->nullable();
            $table->string('hn', 100)->nullable();
            $table->string('an', 100)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('locker_id')->nullable();
            $table->foreign('locker_id')->references('id')->on('lockers')->onDelete('cascade');

            $table->unsignedBigInteger('ward_id')->nullable();
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');

            $table->tinyInteger('active_status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_files');
    }
}
