<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('blog.index', ['posts' => $posts]);
    }

    public function getAdminIndex()
    {
        $post = Post::orderBy('title', 'asc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getLikePost($id)
    {
        $post = Post::where('id', $id)->first();
        $like = new Like();
        $post->Likes()->save($like);
        return redirect()->back();
    }

    public function getPost($id)
    {
        $post = Post::where('id', '=', $id)->first();
        return view('blog.post', ['post' => $post]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit($id)
    {
        $post = Post::find();
        return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = new Post([
            'title'=>request->input('title'), 
            'content'=>request->input('content')
        ]);
        $post->post.save();
        
    }

    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->content = $request->('content');
        $post->save();
        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

    public function getAdminDelete($id) {

        $post = Post::find($id);
        $post()->likes()->delete();
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post Deleted!');
    }
}
