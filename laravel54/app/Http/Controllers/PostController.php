<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /*
     * 文章列表
     */
    public function index()
    {
        return view('post/index');

    }


    /*
     * 新建文章
     */
    public function create()
    {
        return view('post/create');

    }

    /*
     * 存储文章
     */
    public function store()
    {
        return view('post/store');

    }


    /*
     * 编辑文章
     */
    public function edit()
    {
        return view('post/edit');


    }


    /*
     * 更新文章
     */
    public function update()
    {


    }



    /*
     * 删除文章
     */
    public function delete()
    {

    }
}