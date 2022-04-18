<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    

    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('client.product.index', compact('products'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('client.product.create',compact('categories'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('client.product.edit', compact('product'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('client.product.show');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($request->name);
        $name = $request->file('image')->getClientOriginalName();
        $image = time() . $name;
        $attributes['image'] = $image;
        $request->image->move(public_path('images'), $image);
        // $file= $request->file('image')->store('public/images',$image);
        // dd($request);
        Product::create($attributes);
        return redirect('/client/products')->with('status', 'Product created successfully');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->slug = Str::slug($request->input('name'));
        $product->user_id = auth()->id();

        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $image = time() . $name;
            $attributes['image'] = $image;
            $request->image->move(public_path('images'), $image);
        }


        $product->update();
        return redirect('/client/products')->with('status', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $res = Product::find($id)->delete();
        if ($res) {
            return redirect('/client/products')->with('status', 'Product deleted successfully!');
        } else {
            return redirect('/client/products')->with('status', 'There is no product with the given Id!');
        }
    }
}
