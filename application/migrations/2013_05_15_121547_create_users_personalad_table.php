<?php

class Create_Users_Personalad_Table{

  public function up()
  {
    Schema::create('users_personalad', function($table){
      $table->integer('user_id');
      $table->text('user_personalad');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('users_personalad');
  }
}
