@extends('layout')

@section('content')
    <h1>Blog Posts</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <!-- Yeni post oluşturma butonu -->
    <a href="{{ route('posts.create') }}" class="button">New Post</a>

    <div class="posts-container">
        @foreach($posts as $post)
            <div class="post-item">
                <!-- Başlık -->
                <h2>{{ $post->title }}</h2>

                <!-- Resim -->
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
                @endif

                <!-- Açıklama -->
                <p>{{ $post->content }}</p>

                <!-- Düzenle ve Sil butonları -->
                <div class="post-actions">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Düzenle</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
