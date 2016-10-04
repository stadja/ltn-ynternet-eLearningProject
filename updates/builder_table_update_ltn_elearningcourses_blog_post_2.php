<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesBlogPost2 extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_blog_post', function($table)
        {
            $table->text('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_blog_post', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
