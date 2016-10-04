<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesBlogPost extends Migration
{
    public function up()
    {
        Schema::rename('ltn_elearningcourses_blog', 'ltn_elearningcourses_blog_post');
    }
    
    public function down()
    {
        Schema::rename('ltn_elearningcourses_blog_post', 'ltn_elearningcourses_blog');
    }
}
