<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Category_Post');
        Schema::create('Category_Post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('Categories')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('Post')
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
        Schema::table('Category_Post',function($table){
            $table->dropForeign('category_id_foreign');
            $table->dropColumn('category_id');
            $table->dropForeign('post_id_foreign');
            $table->dropColumn('post_id');
        });
    }
}
