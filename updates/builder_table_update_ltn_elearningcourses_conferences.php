<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesConferences extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_conferences', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_conferences', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
