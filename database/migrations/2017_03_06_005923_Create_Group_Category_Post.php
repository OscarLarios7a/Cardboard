<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupCategoryPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Group_Category_Post');
        Schema::create('Group_Category_Post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Group_id')->unsigned();
            $table->integer('Category_id')->unsigned();
            $table->timestamps();
            $table->foreign('Group_id')->references('id')->on('Groups')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('Group_Category_Post',function($table){
            $table->dropForeign('Group_id_foreign');
            $table->dropColumn('Group_id');
            $table->dropForeign('Category_id_foreign');
            $table->dropColumn('Category_id');
        });
    }
}
