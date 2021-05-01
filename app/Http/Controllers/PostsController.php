<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Controllers\Auth;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]); /// it will block all posts functionalities but we want anyone to show index page and show page right?
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts=Post::all(); /// Fetch all data

        $posts=Post::orderBY('created_at','desc')->paginate(10) ; /// pagination
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_iamge' => 'image|nullable',
            //'cover_iamge' => 'image|nullable|max: 1999' /// 2mb max acc to apache sever
        ]);

        /// Handle File Request
        
        if($request->hasFile('cover_image')){
            /// get the file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //only get the file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME); /// basic php

            //get just extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            /// store file name uniquely with timestamps **** IMP
            $fileNametoStore = $fileName.'_'.time().'.'.$extension;
            
            //upload image save it in a folder 
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNametoStore);

        }else{
            $fileNametoStore = 'noimage.jpg';
        }
        
        /// insert into DB using ELOQUENT

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;

        $post->cover_image = $fileNametoStore;

        $post->save();

        return redirect('/posts')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_details =  Post::find($id);
        return view('posts.post_details',compact('post_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            /// get the file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //only get the file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME); /// basic php

            //get just extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            /// store file name uniquely with timestamps **** IMP
            $fileNametoStore = $fileName.'_'.time().'.'.$extension;
            
            //upload image save it in a folder 
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNametoStore);

        }

        /// insert into DB using ELOQUENT

        $post = Post::find($id); /// Changed this line to find the id
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNametoStore;
        }
        $post->save();

        return redirect('/posts')->with('success','Post Updated Successfully'); /// Changed post updated successfully
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        if (auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        $post->delete();

        return redirect('/posts')->with('success','Post Removed');
    }
}
