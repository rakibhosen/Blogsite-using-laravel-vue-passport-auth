<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Letter;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function get_category()
    {
        $category = Category::all();
        return response()->json([
            'data' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:3',
        ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();

        return response()->json([
            'message' => 'Category inserted',
            'data' => $request->all()
        ]);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' => $category,
            'success' => true,
        ]);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $posts = Post::where('cat_id', $id)->get();
        foreach ($posts as $post) {
            $post->delete();
        }
        $category->delete();
        return response()->json([
            'data' => $category,
            'message' => 'deleted'
        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $category->cat_name = $request->cat_name;
        $category->save();

        return response()->json([
            'message' => 'Category inserted',
            'data' => $request->all()
        ]);
    }


    public function All_letter()
    {
        $letter = Letter::latest()->paginate(4);
        return response()->json([
            'message' => 'all subscribed',
            'data' => $letter,
        ]);
    }

    public function Delete_Letter($id)
    {
        $letter = Letter::find($id);

        $letter->delete();
        return response()->json([
            'data' => $letter,
            'message' => 'deleted'
        ]);
    }

    public function add_about(Request $request)
    {
        $about = new About();
        $about->about_us = $request->about_us;
        $about->mission = '';
        $about->save();
        return response()->json([
            'message' => 'about inserted'
        ]);
    }

    public function about_list()
    {
        $about = About::latest()->take(1)->get();
        return response()->json([
            'message' => 'all about',
            'data' => $about,
        ]);
    }

    public function About_delete($id)
    {
        $about = About::find($id);

        $about->delete();
        return response()->json([
            'data' => $about,
            'message' => 'deleted'
        ]);
    }
}
