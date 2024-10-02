<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addcomment(Request $request, $id) {
        $post = Post::findOrFail($id);

        $comment = new Comment();
        $comment->commentownerid = auth()->id();
        $comment->postid = $post->id;
        $comment->commenttext = $request->input('commentinput');

        $comment->save();
        return redirect()->route('home')->with('success', 'Comment added successfully!');
    }
    public function getcomment() {
        $posts = Post::with('comments.owner')->orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }
    public function deletecomment($commentid){
        $comment = Comment::findOrFail($commentid);
        if($comment->commentownerid == Auth::id()){
            $comment->delete();
            return redirect()->route('home')->with('success', 'Comment deleted successfully!');
        }
        else{
            return redirect()->route('home')->with('error', 'The comment is not yours!');
        }
    }
    public function editcomment(Request $request, $commentid){
        $comment = Comment::findOrFail($commentid);
        if($comment->commentownerid == Auth::id()){
            $comment->commenttext = $request->commenteditinput;
            $comment->save();
            return redirect()->route('home')->with('success', 'Comment edited successfully!');
        }
        else{
            return redirect()->route('home')->with('error', 'The comment is not yours!');
        }
    }
}
