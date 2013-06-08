<?php

class Create_Users_Bewatched_Table{

  public function up()
  {
    Schema::create('users_bewatched', function($table){
      $table->integer('user_id');
      $table->integer('watcher_user_id');
      $table->date('watched_date');
    });
  }

  public function down()
  {
    Schema::drop('users_bewatched');
  }
}
