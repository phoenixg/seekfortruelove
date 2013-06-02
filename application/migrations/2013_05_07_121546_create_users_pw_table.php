<?php

class Create_Users_Pw_Table{
       
  public function up()
  {
    Schema::create('users_pw', function($table){
      $table->integer('user_id');
      $table->string('user_email', 100);
      $table->string('user_pw', 100);
    });
  }

  public function down()
  {
    Schema::drop('users_pw');
  }
}