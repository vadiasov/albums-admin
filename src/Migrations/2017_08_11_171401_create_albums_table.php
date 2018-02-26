<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_id')->unsigned();
            $table->foreign('artist_id')
                ->references('id')->on('artists')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title', 100);
            $table->date('release_date')->nullable();
            $table->decimal('price', 5, 2)->nullable();
            $table->string('free', 1);
            $table->string('donate', 1);
            $table->string('genres', 100)->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('albums');
    }
}
