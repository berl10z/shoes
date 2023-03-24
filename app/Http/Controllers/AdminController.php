<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.admin', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }
    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required',
            'count' =>'required',
            'category' => 'required'
        ]);

        $img = $r->file('image');

        $imgPath = $img->store('images', ['disk' => 'public']);

        $product = Product::create([
            'name' => $r->input('name'),
            'description' => $r->input('description'),
            'image' => $imgPath,
            'price' => $r->input('price'),
            'count' => $r->input('count'),
            'category_id' => $r->input('category')
        ]);

        return to_route('admin')->with('success', 'Продукт '.$product->name.' успешно добавлен');;
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit',compact('product','categories'));
    }
    public function update(Request $r, $id)
    {
        $r->validate([
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required',
            'count' => 'required',
            'category' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->name = $r->input('name');
        $product->description = $r->input('description');
        $product->price = $r->input('price');
        $product->count = $r->input('count');
        $product->category_id = $r->input('category');

        if ($r->hasFile('image')) {
            $img = $r->file('image');
            $imgPath = $img->store('images', ['disk' => 'public']);
            $product->image = $imgPath;
        }

        $product->save();

        return to_route('admin')->with('success', 'Продукт успешно обновлен');
    }
    public function destroy($id)
    {
        Product::destroy($id);

        return to_route('admin');
    }
}
