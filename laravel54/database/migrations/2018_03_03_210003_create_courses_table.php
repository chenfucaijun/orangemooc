<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('title', 100);
            $table->string('description', 200);
            //课程富文本内容
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();
        });


        //课程与用户是多对多的关系
        Schema::create('users_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // 用户的id
            $table->integer('course_id'); // 课程的id
            $table->tinyInteger('status')->default(0);  //课程状态 0 不通过／ 1通过
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('users_courses');

    }
}
