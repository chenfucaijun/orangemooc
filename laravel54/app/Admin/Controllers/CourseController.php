<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * 显示课程列表.
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
    public function show($id)
    {
        //
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
