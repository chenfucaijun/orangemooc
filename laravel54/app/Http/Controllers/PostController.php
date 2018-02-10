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
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('post/index', compact('posts'));

    }

    /*
     * 文章详情页
     */
    public function show(Post $post)
    {


        return view('post/show', compact('post'));

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

        //验证
        $this->validate(request(), [
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:8',
        ],[
            'title.min' => "至少输入4个字符",
            'content.required' => "必须输入内容",
        ]);

//        $params = ['title' => request('title'),'content' => request('content')];
        $params = request(['title','content']);
        $post = Post::create($params);

        return redirect('/posts');
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
