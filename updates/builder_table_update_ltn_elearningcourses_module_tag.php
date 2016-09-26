<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesModuleTag extends Migration
{
    public function up()
    {
        Schema::rename('ltn_elearningcourses_classe_tag', 'ltn_elearningcourses_module_tag');
    }
    
    public function down()
    {
        Schema::rename('ltn_elearningcourses_module_tag', 'ltn_elearningcourses_classe_tag');
    }
}
