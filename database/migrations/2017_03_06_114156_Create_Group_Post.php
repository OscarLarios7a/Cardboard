<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Group_Post');
        Schema::create('Group_Post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('Post')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('Groups')
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
        Schema::table('Group_Post',function($table){
            $table->dropForeign('post_id_foreign');
            $table->dropColumn('post_id');
            $table->dropForeign('group_id_foreign');
            $table->dropColumn('group_id');
        });
    }
}
