<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
			$table->foreign('task_id')->references('id')->on('tasks');                 
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');  
            $table->integer('time');
            $table->text('content');
            $table->date('workday');
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
         Schema::dropIfExists('comments');
    }
}
