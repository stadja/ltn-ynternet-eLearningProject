<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesClasses extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->integer('position')->nullable();
            $table->date('creation_date');
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_classes', function($table)
        {
            $table->dropColumn('position');
            $table->dropColumn('creation_date');
        });
    }
}
