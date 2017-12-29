<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barangs_id')->unsigned();
            $table->foreign('barangs_id')->references('id')->on('barangs')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_returned')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_logs');
    }
}
