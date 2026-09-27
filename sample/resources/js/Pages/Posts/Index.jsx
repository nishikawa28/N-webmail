import React from 'react';
import { Link } from '@inertiajs/react';

// posts という Props（引数データ）をコントローラから受け取る
export default function Index({ posts }) {
    return (
        <div style={{ maxWidth: '800px', margin: '40px auto', padding: '0 20px', fontFamily: 'sans-serif' }}>
            <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '24px' }}>
                <h1 style={{ fontSize: '24px', fontWeight: 'bold' }}>投稿一覧</h1>
                {/* 画面遷移には a タグではなく Link コンポーネントを使用 */}
                <Link
                    href="/posts/create"
                    style={{
                        padding: '8px 16px',
                        backgroundColor: '#2563eb',
                        color: '#fff',
                        borderRadius: '6px',
                        textDecoration: 'none'
                    }}
                >
                    新規作成
                </Link>
            </div>

            {/* 投稿が存在しない場合のフォールバック */}
            {posts.length === 0 ? (
                <p style={{ color: '#666' }}>投稿がまだありません。</p>
            ) : (
                <div style={{ display: 'flex', flexDirection: 'column', gap: '16px' }}>
                    {/* Bladeの @foreach に相当する .map() 処理 */}
                    {posts.map((post) => (
                        <div
                            key={post.id}
                            style={{
                                border: '1px solid #e5e7eb',
                                borderRadius: '8px',
                                padding: '16px',
                                backgroundColor: '#fff'
                            }}
                        >
                            <h2 style={{ fontSize: '18px', fontWeight: '600', margin: '0 0 8px 0' }}>
                                <Link
                                    href={`/posts/${post.id}`}
                                    style={{ color: '#1f2937', textDecoration: 'none' }}
                                >
                                    {post.title}
                                </Link>
                            </h2>
                            <p style={{ color: '#4b5563', margin: '0 0 12px 0', whiteSpace: 'pre-wrap' }}>
                                {post.content}
                            </p>
                            <div style={{ fontSize: '12px', color: '#9ca3af' }}>
                                投稿者: {post.author_name}
                            </div>
                        </div>
                    ))}
                </div>
            )}
        </div>
    );
}