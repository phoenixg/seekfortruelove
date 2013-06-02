<?php

class Create_Users_Infoauthed_Table{

  public function up()
  {
    Schema::create('users_infoauthed', function($table){
      $table->integer('user_id');
      $table->integer('user_info_accepted_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('users_infoauthed');
  }
}
