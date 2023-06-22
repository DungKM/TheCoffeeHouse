<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Request;

class commentCotroller extends Controller
{
    public function index()
    {
        $list_comments = Comment::all();
        return $this->views('admin/pages/comment/cmt_user', ['list_comments' => $list_comments]);
    }
    public function delete(Request $request){
        $id = $request->getBody()['id'];
        $p = new Comment();
        $p->delete($id);
        header(("Location:/list-comments"));
        exit;
    }
}
