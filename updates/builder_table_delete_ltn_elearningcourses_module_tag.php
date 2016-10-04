<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLtnElearningcoursesModuleTag extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ltn_elearningcourses_module_tag');
    }
    
    public function down()
    {
        Schema::create('ltn_elearningcourses_module_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }
}
