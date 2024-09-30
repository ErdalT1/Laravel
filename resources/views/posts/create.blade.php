@extends('layout')

@section('content')

<style>
    body {
        background-image: url('/images/background2.jpg'); /* Resmin dosya yolu */
        background-size: cover; /* Resmin tam sayfayı kaplaması */
        background-position: center; /* Resmi ortala */
        background-repeat: no-repeat; /* Tekrarlamamasını sağla */
        background-attachment: fixed; /* Sabit bir arka plan */
    }
</style>

    <h1>Create New Post</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}" required>

        <label>Content</label>
        <textarea name="content" required>{{ old('content') }}</textarea>

        <label>Image</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Save</button>
    </form>
@endsection
