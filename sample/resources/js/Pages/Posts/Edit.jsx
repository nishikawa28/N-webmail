import React from 'react';
import { Link, useForm } from '@inertiajs/react';

export default function Edit({ post }) {
    // 既存の投稿データを初期値として設定
    const { data, setData, put, processing, errors } = useForm({
        title: post.title || '',
        content: post.content || '',
        author_name: post.author_name || '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        // PUT /posts/{id} へ更新リクエストを送信
        put(`/posts/${post.id}`);
    };

    return (
        <div style={{ maxWidth: '600px', margin: '40px auto', padding: '0 20px', fontFamily: 'sans-serif' }}>
            <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '24px' }}>
                <h1 style={{ fontSize: '24px', fontWeight: 'bold' }}>投稿の編集</h1>
                <Link
                    href={`/posts/${post.id}`}
                    style={{ color: '#2563eb', textDecoration: 'none' }}
                >
                    &larr; 詳細に戻る
                </Link>
            </div>

            <form onSubmit={handleSubmit} style={{ display: 'flex', flexDirection: 'column', gap: '16px' }}>
                <div>
                    <label style={{ display: 'block', marginBottom: '6px', fontWeight: '600' }}>タイトル</label>
                    <input
                        type="text"
                        value={data.title}
                        onChange={e => setData('title', e.target.value)}
                        style={{ width: '100%', padding: '8px', border: '1px solid #d1d5db', borderRadius: '4px' }}
                    />
                    {errors.title && <div style={{ color: '#dc2626', fontSize: '12px', marginTop: '4px' }}>{errors.title}</div>}
                </div>

                <div>
                    <label style={{ display: 'block', marginBottom: '6px', fontWeight: '600' }}>本文</label>
                    <textarea
                        value={data.content}
                        onChange={e => setData('content', e.target.value)}
                        rows="5"
                        style={{ width: '100%', padding: '8px', border: '1px solid #d1d5db', borderRadius: '4px' }}
                    />
                    {errors.content && <div style={{ color: '#dc2626', fontSize: '12px', marginTop: '4px' }}>{errors.content}</div>}
                </div>

                <div>
                    <label style={{ display: 'block', marginBottom: '6px', fontWeight: '600' }}>投稿者名</label>
                    <input
                        type="text"
                        value={data.author_name}
                        onChange={e => setData('author_name', e.target.value)}
                        style={{ width: '100%', padding: '8px', border: '1px solid #d1d5db', borderRadius: '4px' }}
                    />
                    {errors.author_name && <div style={{ color: '#dc2626', fontSize: '12px', marginTop: '4px' }}>{errors.author_name}</div>}
                </div>

                <button
                    type="submit"
                    disabled={processing}
                    style={{
                        padding: '10px 16px',
                        backgroundColor: '#10b981',
                        color: '#fff',
                        border: 'none',
                        borderRadius: '6px',
                        fontWeight: '600',
                        cursor: 'pointer',
                        marginTop: '8px'
                    }}
                >
                    {processing ? '更新中...' : '更新する'}
                </button>
            </form>
        </div>
    );
}