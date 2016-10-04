<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLtnElearningcoursesConferenceTag extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ltn_elearningcourses_conference_tag');
    }
    
    public function down()
    {
        Schema::create('ltn_elearningcourses_conference_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('conference_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }
}
