<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesBlogPost3 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_blog_post', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_blog_post', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
