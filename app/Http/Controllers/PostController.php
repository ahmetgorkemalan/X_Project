<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addpost(Request $request){
        $ownerId = Auth::id();

        $post = Post::create([
            'ownerid' => $ownerId,
            'posttext' => $request->posttext,
        ]);
        return redirect()->route('home');
    }
    public function homeshowposts(){
        $posts = Post::all();
        $userId = Auth::id();
        return view('home', compact('posts', 'userId'));
    }
    public function deletepost($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
    public function editpost(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->posttext = $request->posteditinput;
        $post->save();
        return redirect()->back()->with('success', 'Post updated successfully!');
    } 
    public function addremovelike($id) {
        $userid = Auth::id();
        $postid = $id;

        $like = Likes::where('user_id', $userid)->where('post_id', $postid)->first();
        if ($like) {
            $like->delete();
            return redirect()->route('home');
        } 
        else {
            Likes::create([
                'user_id' => $userid,
                'post_id' => $postid,
            ]);
            return redirect()->route('home');
        }
    } 
}