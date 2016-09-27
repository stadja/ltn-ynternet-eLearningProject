<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesCourseTag extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_course_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_course_tag');
    }
}
