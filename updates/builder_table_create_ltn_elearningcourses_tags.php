<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesTags extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('label')->nullable();
            $table->integer('parent')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_tags');
    }
}
