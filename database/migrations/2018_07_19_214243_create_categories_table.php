<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('parent_id')->default(0);
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('type')->default('Page');
        $table->string('picture')->nullable();
        $table->text('description')->nullable();
        $table->text('content')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
