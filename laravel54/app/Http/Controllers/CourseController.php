<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * 显示课程推荐列表.
     *
     * @return Response
     */
    public function all_index()
    {

        $user = \Auth::user();

//        $posts = Course::orderBy('created_at', 'desc')->withCount("zans")->withCount("comments")->with(['user'])->paginate(5);
        $courses = Course::orderBy('created_at', 'desc')->withCount("zans")->paginate(5);

        /*
         * 优化方式:预加载
           $posts->load('user');

         */
        return view('course.all_course_index', compact('courses','user'));
    }

    /**
     * 显示所有课程推荐列表.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view("course.index");
    }





    /**
     * 创建新课程表单页面
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * 将新创建的课程存储到存储器
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 显示指定课程
     *
     * @param int $id
     * @return Response
     */
    public function show(Course $course)
    {
        //
        //预加载,以便于在模板中使用关联模型的时候，预先加载数据，达到MVC的效果
        $course = \Auth::user();
        return view('course/show', compact('course','user'));

    }

    /**
     * 显示编辑指定课程的表单页面
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 在存储器中更新指定课程
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 从存储器中移除指定课程
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
