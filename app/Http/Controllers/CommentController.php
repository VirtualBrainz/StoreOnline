<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Product;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    public function productStore(Request $request)
    {
        $request->validate([
           
            'body'=>'required'
            
         ]);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user()->associate($request->user());
        $product =Product::find($request->product_id);
        $product->comments()->save($comment);
        
        return back()->with('info','El comentario esta siendo evaluado.');
    }

    public function productReplyStore(Request $request)
    {
        $request->validate([
           
            'body'=>'required'
            
         ]);
        $reply = new Comment();
        $reply->body = $request->get('body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');    

        $product =Product::find($request->get('product_id'));
        $product->comments()->save($reply);
        
        return back()->with('info','El comentario esta siendo evaluado.');
    }
   
    public function store(Request $request)
    {
        $request->validate([
           
            'body'=>'required'
            
         ]);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user()->associate($request->user());
        $post =Post::find($request->post_id);
        $post->comments()->save($comment);
        
        return back()->with('info','El comentario esta siendo evaluado.');
    }

    public function replyStore(Request $request)
    {
        $request->validate([
           
            'body'=>'required'
            
         ]);
        $reply = new Comment();
        $reply->body = $request->get('body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');    

        $post =Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        
        return back()->with('info','El comentario esta siendo evaluado.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('info','Borrado con éxito');
    }

    public function edit(Comment $comment)
    {
        $data = [
            'comment' => $comment
        ];
        return view('admin.posts.partials._editComments', $data);
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
           
            'body'=>'required'
            
         ]);

         $comment->fill($request->all())->save();
         return back()->with('info','Actualizado con éxito');
        }
}
