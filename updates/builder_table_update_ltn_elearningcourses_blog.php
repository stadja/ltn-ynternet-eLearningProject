<?php namespace LTN\ElearningCourses\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLtnElearningcoursesBlog extends Migration
{
    public function up()
    {
        Schema::table('ltn_elearningcourses_blog', function($table)
        {
            $table->string('title')->nullable();
            $table->integer('author')->nullable()->unsigned();
            $table->text('content')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('ltn_elearningcourses_blog', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('author');
            $table->string('content', 255)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
