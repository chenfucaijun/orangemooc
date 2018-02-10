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
        ], [
            'title.min' => "至少输入4个字符",
            'content.required' => "必须输入内容",
        ]);

//        $params = ['title' => request('title'),'content' => request('content')];
        $params = request(['title', 'content']);
        $post = Post::create($params);

        return redirect('/posts');
    }


    /*
     * 编辑文章
     */
    public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }


    /*
     * 更新文章
     */
    public function update(Post $post)
    {
        //验证
        $this->validate(request(), [
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:10',
        ]);

        //更新数据
        $post->title = request('title');
        $post->content = request('content');

        $post->save();
        return redirect("/posts/{$post->id}");
    }


    /*
     * 删除文章
     */
    public function delete()
    {

    }

    /*
     * 图片上传
     */
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/' . $path);
    }
}
