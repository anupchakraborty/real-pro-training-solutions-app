<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('backend.pages.courses.comments.index', compact('comments'));
    }

    public function destory($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        $notification = array(
            'message' => 'Comment has been Deleted !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
