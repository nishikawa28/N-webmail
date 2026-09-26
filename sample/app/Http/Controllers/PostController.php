<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //動作テスト
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //投稿フォーム画面を表示
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション（必須チェック・文字数制限）
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'content'     => 'required',
            'author_name' => 'required|max:50',
        ]);

        // DBに保存
        Post::create($validated);

        // 一覧画面へリダイレクト
        return redirect()->route('posts.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        /*Display the specified resource.*/
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // 編集対象の投稿データをビューに渡す
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // バリデーション
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'content'     => 'required',
            'author_name' => 'required|max:50',
        ]);

        // DBのデータを更新
        $post->update($validated);

        // 詳細画面へリダイレクト
        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // 投稿を削除
        $post->delete();

        // 一覧画面へリダイレクト
        return redirect()->route('posts.index');
    }
}
