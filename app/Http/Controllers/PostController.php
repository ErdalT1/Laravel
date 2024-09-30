<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Tüm postları listelemek için
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Yeni post oluşturma formunu göstermek için
    public function create() {
        return view('posts.create');
    }

    // Yeni postu kaydetmek için
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Resmi depolama
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content']); // Sadece gerekli alanları al
        if ($request->hasFile('image')) {
            // Eski resmi sil (varsa)
            if ($post->image && \Storage::disk('public')->exists($post->image)) {
                \Storage::disk('public')->delete($post->image);
            }

            // Yeni resmi depola
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    // resmi silmek için
    public function destroy(Post $post)
    {
        // Resmi sil (varsa)
        if ($post->image && \Storage::disk('public')->exists($post->image)) {
            \Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }

    public function edit($id) {
        // İlgili postu id ile bul
        $post = Post::find($id);

        // Eğer post bulunamazsa 404 hatası döndür
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }

        // Postu düzenleme sayfasına gönder
        return view('posts.edit', compact('post'));
    }

}


