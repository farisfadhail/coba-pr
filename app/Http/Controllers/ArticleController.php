<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::paginate(10);
        return view('admin.article.index',[
            'articles'=>$article
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create',  compact('categories'));
    }

    public function store(Request $request){
        $article = new Article([
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'category_id' => $request->input('category'),
            'user_id' => Auth::id()
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image');
            $article->image = $imagePath;
        }

        $article->save();

        $tags = explode(',', $request->tags);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tag()->attach($tag);
        }

        return redirect()->route('admin.article.index');
    }

    public function show(string $id){
        return view('admin.article.show',[
            'article' => Article::find($id)
        ]);
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = $article->tag->implode('name', ',');

        return view('admin.article.edit', compact('article','tags','categories'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->title = $request->input('title');
        $article->full_text = $request->input('full_text');
        $article->category_id = $request->input('category');

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }
            $imagePath = $request->file('image')->store('image');
            $article->image = $imagePath;
        }

        $article->save();

        $tags = explode(',', $request->tags);
        $tag_tambah = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($tag_tambah, $tag->id);
        }
        $article->tag()->sync($tag_tambah);

        return redirect()->route('admin.article.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->tag()->detach();

        $article->delete();

        return redirect()->route('admin.article.index')->with('success', 'Article deleted successfully');
    }
}
