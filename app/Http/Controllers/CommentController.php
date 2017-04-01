<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['post', 'comment'])->get();
        return view('temp.comment.index', compact('comments'));
    }

    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            $commentData = $request->all();
            $commentData['approved'] = Comment::AUTO_APPROVE;

            Comment::create($commentData);

            \DB::commit();
            return redirect()->back();

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        \DB::beginTransaction();
        try {
            $postID = $comment->post->id;
            $comment->delete();

            \DB::commit();
            return redirect()->route('post.show', $postID);

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    public function trashed()
    {
        $comments = comment::onlyTrashed()->with(['post', 'comment'])->get();
        return view('temp.comment.trashed', compact('comments'));
    }

    public function restore($id)
    {
        \DB::beginTransaction();
        try {
            comment::withTrashed()->find($id)->restore();

            \DB::commit();
            return redirect()->route('comment.index');

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    public function delete($id)
    {
        \DB::beginTransaction();
        try {

            comment::withTrashed()->find($id)->forceDelete();

            \DB::commit();
            return redirect()->back();

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }

    public function approve(Comment $comment)
    {
        \DB::beginTransaction();
        try {

            $comment->approved = true;
            $comment->save();

            \DB::commit();
            return redirect()->back();

        } catch (Exception $e) {
            \DB::rollBack();
            dd($e);
        }
    }
}
