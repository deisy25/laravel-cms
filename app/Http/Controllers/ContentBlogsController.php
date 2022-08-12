<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\ContentBlog;

class ContentBlogsController extends Controller
{

    public function list()
    {
        return view('contentblogs.list', [
            'contentblogs' => ContentBlog::all()
        ]);
    }

    public function addForm()
    {
        return view('contentblogs.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $contentblog = new Contentblog();
        $contentblog->title = $attributes['title'];
        $contentblog->content = $attributes['content'];
        $contentblog->save();

        return redirect('/console/contentblogs/list')
            ->with('message', 'content blogs has been added!');
    }

    public function editForm(Contentblog $contentblog)
    {
        return view('contentblogs.edit', [
            'contentblog' => $contentblog,
        ]);
    }

    public function edit(Contentblog $contentblog)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $contentblog->title = $attributes['title'];
        $contentblog->content = $attributes['content'];
        $contentblog->save();

        return redirect('/console/contentblogs/list')
            ->with('message', 'Content Blog has been edited!');
    }

    public function delete(Contentblog $contentblog)
    {
        $contentblog->delete();
        
        return redirect('/console/contentblogs/list')
            ->with('message', 'Content Blog has been deleted!');        
    }
}
