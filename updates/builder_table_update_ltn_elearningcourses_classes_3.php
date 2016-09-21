<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesClasses3 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->integer('course')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->integer('course')->unsigned(false)->change();
        });
    }
}
