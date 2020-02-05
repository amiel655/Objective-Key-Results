<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function addItem(Request $request)
    {
        $data = new Comment();
        $data->okr_id = $request->okr_id;
        $data->fullname = auth()->user()->firstname.' '.auth()->user()->lastname;
        $data->objective = $request->objective;
        $data->comment = $request->name;
        $data->save();

        return response()->json($data);
    }

    public function viewComment(Request $request)
    { 
        $distinct = Comment::where('okr_id', $request->okr_id)->distinct()->get(['objective']);
        $count = Comment::where('okr_id', $request->okr_id)->count();
       $comment =  Comment::where('okr_id', $request->okr_id)->get();
        return view('view-comment' , compact('distinct', 'comment', 'count'));
    }

    public function deleteItem(Request $req)
    {
        Comment::find($req->id)->delete();

        return response()->json();
    }
}
