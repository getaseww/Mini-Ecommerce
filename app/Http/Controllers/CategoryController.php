<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::paginate(10);
        return view('client.category.index', compact('category'));
    }

    public function create()
    {
        return view('client.category.create');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('client.category.edit', compact('category'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('client.category.show');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($request->name).'-'.strval(auth()->id());

        // dd($attributes);
        Category::create($attributes);
        return redirect('/client/categories')->with('status', 'Category created successfully');
    }

    public function visibility($id){
        $category=Category::find($id);
        if($category->visible){
            $category->visible=0;
        }else{
            $category->visible=1;
        }
        $category->update();
        return redirect('/client/categories')->with('status', 'Visibility changed!');

    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->slug = Str::slug($request->input('name'));
        $category->user_id = auth()->id();

        $category->update();
        return redirect('/client/categories')->with('status', 'category updated successfully!');
    }

    public function destroy($id)
    {
        $res = Category::find($id)->delete();
        if ($res) {
            return redirect('/client/categories')->with('status', 'Category deleted successfully!');
        }else{
            return redirect('/client/categories')->with('status', 'There is no category with the given Id!');
        }
    }
}
