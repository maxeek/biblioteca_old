<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->id();



            $table->unsignedBigInteger('book_user_id');
            $table->unsignedBigInteger('book_id');

            $table->date('date_in');
            $table->date('date_out');



            $table->foreign('book_user_id')->references('id')->on('user_books')
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign('book_id')->references('id')->on('books')
            ->onDelete("cascade")
            ->onUpdate("cascade");

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
        Schema::dropIfExists('leases');
    }
};
