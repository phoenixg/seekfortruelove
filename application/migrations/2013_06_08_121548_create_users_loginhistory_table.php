<?php

class Create_Users_Loginhistory_Table{

  public function up()
  {
    Schema::create('users_loginhistory', function($table){
      $table->integer('user_id');
      $table->date('login_at');
    });
  }

  public function down()
  {
    Schema::drop('users_loginhistory');
  }
}
