<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesClasses5 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->string('tags')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->dropColumn('tags');
        });
    }
}
