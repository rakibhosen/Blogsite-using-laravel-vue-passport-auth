<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Contact;
use App\Letter;
use App\Post;
use Illuminate\Http\Request;
use Auth;

class BlogPostController extends Controller
{



    public function index(){
        return view('public.index');
    }

   public function BlogPost(){
    $blog =  Post::with('user', 'category','admin')->withCount('comments')->latest()->paginate(4);
    return response()->json([
        'data'=>$blog,
        'success'=>true,
     ]);
    }

    
    public function SidebarBlogPost(){
        $blog = Post::with('category','user')->withCount('comments')->orderBy('id', 'desc')->take(6)->get();
        return response()->json([
            'data'=>$blog,
            'success'=>true,
         ]);
    }

    public function SingleBlog($id){
        $blog = Post::with('category','user','admin')->where('id',$id)->first();

        return response()->json([
            'data'=>$blog,
            'success'=>true,
         ]);
    }

    public function getCategories(){
        $categories = Category::orderBy('id','desc')->withCount('posts')->get();
        return response()->json([
            'data'=>$categories,
            'success'=>'true'
        ]);
    }
    public function getPostById($id){
        $posts =  Post::with('user', 'category','admin')->withCount('comments')->where('cat_id',$id)->latest()->paginate(4);
        // $posts = Post::with('user','category')->where('cat_id',$id)->orderBy('id','desc')->get();
        return response()->json([
            'data'=>$posts
        ],200);
    }


    public function RealSearch(){
        $search = \Request::get('s');
        if($search!=null)
        {
        $posts = Post::with('user','category')
        ->where('title','LIKE',"%$search%")
        ->orWhere('description','LIKE',"%$search%")
        ->paginate(2);;
        return response()->json([
            'data'=>$posts,
            'success'=>true,
        ]);
    }else{
       return $this->BlogPost();
    }
    }

    public function UserMessage(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'message'=>'required',
        ]);
        $contact = new Contact();
        $contact->email =$request->email;
        $contact->subject =$request->subject;
        $contact->message =$request->message;
        $contact->name =$request->name;
        $contact->save();
 
        return response()->json([
            'message'=>'Message sent',
            'data'=>$request->all()
        ]);
    }

    public function AddLetter(Request $request){
        $letter = new Letter();
        $letter->email =$request->email;
        $letter->save();
        return response()->json([
            'message'=>'Email sent',
           
        ]);
    }
    

    public function get_about(){
        $about= About::latest()->take(1)->get();
        return response()->json([
            'message'=>'all about',
             'data'=>$about,
        ]);
    }

    


}

