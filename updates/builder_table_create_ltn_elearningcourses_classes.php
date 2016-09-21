<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesClasses extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_classes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->text('conclusion')->nullable();
            $table->integer('course')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_classes');
    }
}
