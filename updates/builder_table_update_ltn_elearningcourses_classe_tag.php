<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesClasseTag extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_classe_tag', function($table)
        {
            $table->renameColumn('classe_id', 'class_id');
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_classe_tag', function($table)
        {
            $table->renameColumn('class_id', 'classe_id');
        });
    }
}
