<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.categories.index',[
            'categories'=>$category
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request){
        $category = new Category([
            'name' => $request->input('name')
        ]);

        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
