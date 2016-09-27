<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesModules extends Migration
{
    public function up()
    {
        Schema::rename('ltn_elearningcourses_classes', 'ltn_elearningcourses_modules');
    }
    
    public function down()
    {
        Schema::rename('ltn_elearningcourses_modules', 'ltn_elearningcourses_classes');
    }
}
