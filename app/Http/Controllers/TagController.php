<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::paginate(10);
        return view('admin.tag.index',[
            'tags'=>$tag
        ]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(CreateTagRequest $request){
        $tag = new Tag([
            'name' => $request->input('name')
        ]);

        $tag->save();

        return redirect()->route('admin.tags.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tag.edit', [
            'tag' => $tag
        ]);
    }

    public function update(UpdateTagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag ->delete();

        return redirect()->route('admin.tags.index');
    }
}
