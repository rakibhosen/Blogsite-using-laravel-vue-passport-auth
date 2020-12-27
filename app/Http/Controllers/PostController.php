<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;
use File;

class PostController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function get_post()
    {
        $posts = Post::with('category', 'admin')->latest()->paginate(6);
        return response()->json([
            'data' => $posts,
        ]);
        
        // $posts = cache('posts', function () {
        //     return Post::with('admin', 'category')->latest()->get();
        // });
        //   return response()->json([
        //     'data' => $posts,
        // ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $image= $request->photo;
        $location = public_path('uploadImage/'.$name);
        Image::make($image)->resize(750, 400)->save($location);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->admin_id = Auth::user('admin')->id;
        $post->photo = $name;
        $post->save();
    }

    public function updatePost(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);


        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo)->resize(750, 400);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->admin_id = Auth::user('admin')->id;
        $post->photo = $name;
        $post->save();
    }


    public function editPost($id)
    {
        $post = Post::find($id);
        return response()->json([
            'post' => $post,
        ]);
    }

    public function deletePost($id)
    {
        // $post = Post::find($id);
        // $post->delete();
        // return response()->json([
        //     'data' => $post,
        //     'success' => true,
        // ]);
        $post= Post::find($id);
        if(!is_null($post))
        {
            //delete postimage
            if(File::exists('/uploadimage/'.$post->photo))
            {

          
                File::delete('/uploadimage/'.$post->photo);
            }
            $post->delete();
                return response()->json([
            'data' => $post,
            'success' => true,
        ]);
        }
    }

    public function AllUsers(){
        $users=  User::latest()->paginate(4);
        return response()->json([
            'data'=>$users,
            'success'=>true,
         ]);
        }

        public function DeleteUser($id){
            $user= User::find($id);
            $user->delete();
            return response()->json([
                'success'=>true,
             ]);
        }


}
