<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesEvents extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('date')->nullable();
            $table->text('info')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_events');
    }
}
