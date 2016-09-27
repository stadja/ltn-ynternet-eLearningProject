<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLtnElearningcoursesConferences extends Migration
{
    public function up()
    {
        Schema::create('ltn_elearningcourses_conferences', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('date')->nullable();
            $table->integer('author')->nullable()->unsigned();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ltn_elearningcourses_conferences');
    }
}
