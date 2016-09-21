<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesCourses extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_courses', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('author')->nullable();
            $table->text('full_description')->nullable();
            $table->text('small_description')->nullable();
            $table->date('creation_date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_courses');
    }
}
