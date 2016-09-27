<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLtnElearningcoursesCourseTag extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ltn_elearningcourses_course_tag');
    }
    
    public function down()
    {
        Schema::create('ltn_elearningcourses_course_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }
}
