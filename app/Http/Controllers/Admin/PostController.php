<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    protected $validationRules = [
        "title" => "string|required|max:100",
        "content" => "string|required",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // VALIDATION
        $request->validate($this->validationRules);

        $newPost = new Post();
        $newPost->fill($request->all());
        
        $slug =  Str::of($request->title)->slug('-');
        
        
        $postExists = Post::where("slug", $slug)->first();
  
            $count = 2;
            while($postExists) {
                $slug = Str::of($request->title)->slug('-') . "-{$count}";
                $postExists = Post::where("slug", $slug)->first();
                $count++;
            }
       
        $newPost->slug = $slug;

        $newPost->save();
        return redirect()->route('admin.posts.index')->with('success', 'Il post è stato creato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
         return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRules);

        if($post->title != $request->title ) {

            $slug =  Str::of($request->title)->slug('-');
            
            
            $postExists = Post::where("slug", $slug)->first();
      
                $count = 2;
                while($postExists) {
                    $slug = Str::of($request->title)->slug('-') . "-{$count}";
                    $postExists = Post::where("slug", $slug)->first();
                    $count++;
                }
           
            $post->slug = $slug;
        }

        $post->fill($request->all());
        $post->save();

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', "Il post {$post['id']} è stato eliminato");
    }
}
