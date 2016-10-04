<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesModules2 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_modules', function($table)
        {
            $table->string('youtube_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_modules', function($table)
        {
            $table->dropColumn('youtube_id');
        });
    }
}
