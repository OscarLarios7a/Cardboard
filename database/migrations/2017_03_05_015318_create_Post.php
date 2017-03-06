<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Post');
        Schema::create('Post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TitlePost');
            $table->string('InfoPost');
            $table->string('Imgpost');
            $table->integer('Category_id')->unsigned();
            $table->timestamps();
           
            $table->foreign('Category_id')->references('id')->on('Categories')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
