<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesTags extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_tags', function($table)
        {
            $table->renameColumn('parent', 'parent_id');
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_tags', function($table)
        {
            $table->renameColumn('parent_id', 'parent');
        });
    }
}
