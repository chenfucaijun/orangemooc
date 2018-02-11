<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    /*
     * 文章列表
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->withCount("zans")->withCount("comments")->paginate(5);
        return view('post/index', compact('posts'));

    }

    /*
     * 文章详情页
     */
    public function show(Post $post)
    {

        //预加载,以便于在模板中使用关联模型的时候，预先加载数据，达到MVC的效果
        $post->load('comments');
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

        //逻辑
        $user_id = \Auth::id();
        $params = array_merge(request(['title', 'content']), compact('user_id'));
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

        //对用户授权：修改
        $this->authorize('update', $post);

        //更新数据
        $post->title = request('title');
        $post->content = request('content');

        $post->save();
        return redirect("/posts/{$post->id}");
    }


    /*
     * 删除文章
     */
    public function delete(Post $post)
    {
        //对用户授权：修改
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/posts');
    }

    /*
     * 图片上传
     */
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/' . $path);
    }

    /*
     * 提交评论
     */
    public function comment(Post $post)
    {

        //验证
        $this->validate(request(), [
            'content' => 'required|min:3',
        ]);

        //逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);

        //渲染

        return back();
    }

    /*
     * 点赞
     */
    public function zan(Post $post)
    {
        $zan = new \App\Zan;
        $zan->user_id = \Auth::id();
        $post->zans()->save($zan);
        return back();
    }

    /*
    * 取消点赞
    */
    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }

    /*
     * 搜索
     */
    public function search()
    {
        return "this is search";
    }
}
