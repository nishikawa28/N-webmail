import React from 'react';
import { Link , router } from '@inertiajs/react';

export default function Show({ post }) {
    // 削除確認とリクエスト送信
    const handleDelete = () => {
        if (confirm('本当にこの投稿を削除しますか？')) {
            router.delete(`/posts/${post.id}`);
        }
    };

    return (
        <div style={{ maxWidth: '700px', margin: '40px auto', padding: '0 20px', fontFamily: 'sans-serif' }}>
            <div style={{ marginBottom: '20px' }}>
                <Link
                    href="/posts"
                    style={{ color: '#2563eb', textDecoration: 'none' }}
                >
                    &larr; 一覧に戻る
                </Link>
            </div>

            <article style={{ border: '1px solid #e5e7eb', borderRadius: '8px', padding: '24px', backgroundColor: '#fff' }}>
                <h1 style={{ fontSize: '24px', fontWeight: 'bold', margin: '0 0 12px 0' }}>
                    {post.title}
                </h1>

                <div style={{ fontSize: '14px', color: '#6b7280', marginBottom: '20px' }}>
                    投稿者: {post.author_name}
                </div>

                <div style={{ color: '#374151', lineHeight: '1.6', whiteSpace: 'pre-wrap', marginBottom: '32px' }}>
                    {post.content}
                </div>

                <div style={{ display: 'flex', gap: '12px', borderTop: '1px solid #f3f4f6', paddingTop: '16px' }}>
                    <Link
                        href={`posts/${post.id}/edit`}
                        style={{
                            padding: '6px 12px',
                            backgroundColor: '#4b5563',
                            color: '#fff',
                            borderRadius: '4px',
                            textDecoration: 'none',
                            fontSize: '14px'
                        }}
                    >
                        編集する
                    </Link>

                    {// 画面の部分
                        } 
                    <button
                        type = "button"
                        onClick = {handleDelete}
                        style = {{
                            padding: `6px 12px`,
                            backgroundColor: `#dc2525`,
                            color: `#fff`,
                            border: `none`,
                            borderRadius: `5px`,
                            fontSize: `15px`,
                            cursor: `pointer`
                        }}
                    >
                        削除する
                    </button>
                </div>
            </article>
        </div>
    );
}