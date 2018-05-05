<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->paginate(5);
      return view('post.index', compact('posts'));
    }
    //Membuat Artikel Baru
    public function create()
    {
      $categories = Category::all();
      return view('post.create', compact('categories'));
    }

    //Menyimpan Artikel
    public function store()
    {
      $this->validate(request(), [
        'title' => 'required',
        'content' => 'required',
      ]);
      Post::create([
        'title' => request('title'),
        'slug' => str_slug(request('title')),
        'content' => request('content'),
        'category_id' => request('category_id'),
      ]);

      return redirect()->route('post.index')->with('success', 'Post ditambahkan');
    }

    public function show(Post $post)
    {
      return view('post.show', compact('post'));
    }

    //Edit Artikel
    public function edit(Post $post)
    {
      $categories = Category::all();

      return view('post.edit', compact('post', 'categories'));
    }

    //Update Artikel
    public function update(Post $post)
    {
      $post->update([
        'title' => request('title'),
        'category_id' => request('category_id'),
        'content' => request('content'),
      ]);

      return redirect()->route('post.index')->withInfo('Post berhasil diubah');
    }

    public function destroy(Post $post)
    {
      $post->delete();

      return redirect()->route('post.index')->withDanger('Post dihapus!');
    }

}
