<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
  public function index()
  {
     $categories = category::paginate(10);
     return view('admin.category.index', compact('categories'));

  }
  public function create()
  {
    return view('admin.category.create');
  }
  public function store(Request $request)
  {

    $request->validate([
      'name' => 'required|string',
      'description' => 'required|min:5',
      'image' => 'image|nullable',

    ]);

    $file_name = '';
    $filename = "";
    if ($request->hasfile('image')) {
      $file_extention = $request->file('image');
      $file_name = $file_extention->getClientOriginalExtension(); //getting image extention
      $filename = time() . '.' . $file_name;
      $path = 'images/category';
      $file_extention->move($path, $filename);
    }

    category::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=> $filename,
        'status'=>$request->status == true ? '1' : '0',
    ]);

    return redirect()->route('category.index')->with('success','the category '.$request->name.' added successfully');
    }



  public function edit($id)
  {
    $category = category::findOrFail($id);
    return view('admin.category.edit', compact('category', 'id'));
  }

  public function update(Request $request)  {
    $request->validate([
      'name' => 'required|string',
      'description' => 'required|min:5',
      'image' => 'image|nullable',

    ]);

    $file_name = '';
    $filename = "download.png";
    if ($request->hasfile('image')) {
      $file_extention = $request->file('image');
      $file_name = $file_extention->getClientOriginalExtension(); //getting image extention
      $filename = time() . '.' . $file_name;
      $path = 'images/category';
      $file_extention->move($path, $filename);
    }

    $category = category::findOrFail($request->id);
    $category->name = $request->name;
    $category->description = $request->description;
    $category->image = $filename;
    $category->status = $request->status == true ? '1' : '0';

    $category->update();
    return redirect()->route('category.index')->with('success','the category '.$request->name.' Updated successfully');


    }


  public function delete($id){
    $cat = category::findOrFail($id);
    $cat->delete();

    return redirect()->route('category.index')->with('success','the category Deleted successfully');
  }

//   public function visibility(Request $request){
//     $catstatus = category::findOrFail($request->id_cat);
//     $catstatus->status = $request->status;
//     $catstatus->update();
//     return to_route('category.index')->with('success','status visibility has changed');
//   }

    public function toggleVisibility($id)
    {
        $category = Category::findOrFail($id);
        $category->status = $category->status == "1" ? "0" : "1";
        $category->save();

        return redirect()->route('category.index')->with('success', 'Visibility toggled successfully');
    }
}

