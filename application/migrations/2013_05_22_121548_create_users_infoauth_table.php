<?php

class Create_Users_Infoauth_Table{

  public function up()
  {
    Schema::create('users_infoauth', function($table){
      $table->integer('user_id');
      $table->string('user_info_requested_id', 200);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('users_infoauth');
  }
}
