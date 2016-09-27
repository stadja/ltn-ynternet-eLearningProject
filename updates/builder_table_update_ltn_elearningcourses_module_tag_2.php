<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesModuleTag2 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_module_tag', function($table)
        {
            $table->renameColumn('class_id', 'module_id');
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_module_tag', function($table)
        {
            $table->renameColumn('module_id', 'class_id');
        });
    }
}
