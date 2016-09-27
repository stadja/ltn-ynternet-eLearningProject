<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesEntityTag extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_entity_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('entity_id')->unsigned();
            $table->text('entity_type');
            $table->integer('tag_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_entity_tag');
    }
}
