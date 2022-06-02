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
           
            
        
            $table->unsignedBigInteger('id_user_book');
            $table->unsignedBigInteger('id_book');

            $table->date('date_in');
            $table->date('date_out');
            
            
            
            $table->foreign('id_user_book')->references('id')->on('user_books')
            ->onDelete("cascade")
            ->onUpdate("cascade");
            
            $table->foreign('id_book')->references('id')->on('books')
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
