<?php

class Create_Users_Noticeboard_Table{

  public function up()
  {
    Schema::create('users_noticeboard', function($table){
      $table->integer('user_id');
      $table->text('user_notice');
    });
  }

  public function down()
  {
    Schema::drop('users_noticeboard');
  }
}
