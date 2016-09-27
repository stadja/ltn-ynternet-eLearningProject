<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesBlog extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_blog', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id')->unsigned();
            $table->dateTime('date')->nullable();
            $table->string('content')->nullable();
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_blog');
    }
}
