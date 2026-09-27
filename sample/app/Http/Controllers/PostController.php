<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        // 第1引数: resources/js/Pages/ からのパス（拡張子なし）
        // 第2引数: React側に渡す Props
        return Inertia::render('Posts/Index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // 
    return Inertia::render('Posts/Create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author_name' => 'required|max:50',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // 編集対象の投稿データをビューに渡す
        return Inertia::render('Posts/Edit', [
            'post' => $post,
        ]);
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
