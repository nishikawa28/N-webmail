<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_con extends Controller
{
    // 一覧
    public function index()
    {
        return Post::all();
    }

    // 詳細
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    // 新規登録
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:255'
        ]);

        return Post::create($validated);
    }

    // 編集
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|max:255'
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return $post;
    }

    // 削除
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
