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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('user_book_id');

            $table->integer('inventory')->unique();

            $table->string('title', 100);
            $table->string('others_auth',  40)->nullable();
            $table->string('edition', 40)->nullable();
            $table->string('land', 40)->nullable();
            $table->string('editorial', 40)->nullable();
            $table->integer('year')->nullable();
            $table->text('description')->nullable();

            $table->text('tags', 2000)->nullable();
            $table->text('observation')->nullable();
            $table->integer('condition')->nullable();
            $table->string('signatura_top',30)->nullable();


            $table->timestamps();





             $table->foreign('author_id')->references('id')->on('authors')
             ->onDelete("cascade")
             ->onUpdate("cascade");

            //  $table->foreign('user_book_id')->references('id')->on('user_books')
            //  ->onDelete("cascade")
            //  ->onUpdate("cascade");

              $table->foreign('category_id')->references('id')->on('categories')
             ->onDelete("cascade")
             ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
