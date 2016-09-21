<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesClasses4 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->renameColumn('course', 'course_id');
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->renameColumn('course_id', 'course');
        });
    }
}
