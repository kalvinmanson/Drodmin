<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('blocks', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('category_id');
        $table->foreign('category_id')->references('id')->on('categories');
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->string('name');
        $table->string('picture')->nullable();
        $table->text('description')->nullable();
        $table->text('content')->nullable();
        $table->string('link')->nullable();
        $table->integer('weight')->default(0);
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
        Schema::dropIfExists('blocks');
    }
}
