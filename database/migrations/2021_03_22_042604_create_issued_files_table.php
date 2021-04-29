<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issued_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('place', 100)->nullable();
            $table->string('issue_date', 100)->nullable();
            $table->tinyInteger('is_received')->default(1);
            $table->string('receive_date', 100)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('file_id')->nullable();
            $table->foreign('file_id')->references('id')->on('p_files')->onDelete('cascade');

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
        Schema::dropIfExists('issued_files');
    }
}
