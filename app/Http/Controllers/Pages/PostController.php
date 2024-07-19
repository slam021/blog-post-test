<?php

namespace App\Http\Controllers\Pages;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PostAccessRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $role_id = auth()->user()->role_id;
        if($role_id == 1){
            $posts = Post::with('account')->get();
        }elseif($role_id == 2){
            $posts = Post::with('account')->where('account_id', auth()->user()->id)->get();
        }
        $author_id = auth()->user()->author_id;

        // dd($author_id);
        return view('pages.posts.index', compact('posts', 'author_id'));
    }

    public function create(){
        return view('pages.posts.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date_post' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->date_post = $request->date_post;
        $post->account_id = Auth::user()->id;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post berhasil ditambah!');
    }



    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date_post' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->account_id = Auth::user()->id;
        $post->date_post = $validatedData['date_post'];

        $post->save();

        return redirect()->route('post.index')->with('success', 'Post berhasil diupdate!');
    }

    public function show($id)
    {
        $post = Post::with('account')->findOrFail($id);
        return view('pages.posts.show', compact('post'));
    }

    public function delete($id)
    {
        $post = POST::findOrFail($id);

        $post->delete();

        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
