<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notification;
use App\Category;

use Auth;
use URL;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:categories|max:255'
    ]);
    $category = new Category;
    $category->name = $request->name;
    $category->slug = str_slug($request->slug);
    $category->save();

    //log notification
    $notification = Notification::create([
      'name' => 'Category created.',
      'user_id' => Auth::user()->id,
      'location' => URL::previous(),
      'data' => $category->toJson()
    ]);

    flash('Record saved')->success();
    return redirect()->route('admin.categories.index');
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.categories.edit', compact('category'));
  }

  public function update(Request $request, $id)
  {

  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);
    if($category->pages->count() > 0) {
      flash('Destroy or move all children contents before destroy this element.')->error();
      return redirect()->route('admin.categories.edit', $category->id);
    }
    $category->delete();
    flash('Record was destroyed.')->success();
    return redirect()->route('admin.categories.index');
  }
}
