@extends('layout')

@section('content')

<style>
    body {
        background-image: url('/images/background7.jpg'); /* Resmin dosya yolu */
        background-size: cover; /* Resmin tam sayfayı kaplaması */
        background-position: center; /* Resmi ortala */
        background-repeat: no-repeat; /* Tekrarlamamasını sağla */
        background-attachment: fixed; /* Sabit bir arka plan */
    }
</style>

    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" value="{{ $post->title }}" required>

        <label>Content</label>
        <textarea name="content" required>{{ $post->content }}</textarea>

        <label>Current Image</label>
        @if($post->image)
            <div>
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
            </div>
        @else
            <p>No image available.</p>
        @endif

        <label>Change Image</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Update</button>
    </form>

@endsection
