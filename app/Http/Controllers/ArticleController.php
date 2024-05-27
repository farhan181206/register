<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('article.index',compact('article'));
    }

    public function create()
    {
        $category = Category::where('status','on')->get();
        return view('article.create',compact('category'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|max:2048',
            'title' => 'required|min:5|unique:articles,title',
            'desc' => 'required',
        ]);

        $data['slug'] = Str::slug($request->title,'-');
        
        if($request->hasFile('image'))
        {
            $image = $request->file('image')->store('assets','public');
            $data['image'] = $image;
        }else{
            return redirect()->back()->with('error','File Gmabar tidak do temukan');
        }

        Article::create($data);

        return redirect()->route('article.index');
    }

    public function show()
    {
        return view('article.detail');
    }

    public function edit($id)
    {
        $category = Category::where('status','on')->get();
        $data = Article::find($id);
        return view('article.edit',compact('category','data'));
    }

    public function update(Request $request,$id)
    {
        $update = Article::findOrFail($id);
        $data = $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:5|unique:articles,title',
            'desc' => 'required',
        ]);
        $data['slug'] = Str::slug($request->title,'-');
        
        if($request->hasFile('image'))
        {
            $image = $request->file('image')->store('assets','public');
            $data['image'] = $image;
        }else{
            $data['image'] = $update->image;
        }

        $update->update($data);

        return redirect()->route('article.index');
    }
}
