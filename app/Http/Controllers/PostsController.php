<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;


use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function create()
    {
        return view('posts.create');

    }
    public function store( )
    {
       $data = request()->validate(
           [
           'caption'=>'required',
           'image'=>['required','image' ],
     
         ]);

       $imagePath= request('image')->store('uploads','public');
      //  $image= Image::make(public_path('storage/{"$imagePath"}'))->fit(1200, 1200);
      //  $image->save();
  
       //USING THE RELATIONSHIP TO CREATE NEW POST BY A USER AUTH

       auth()->user()->posts()->create([
             'caption'=> $data['caption'],
             'image' => $imagePath,
             
       ]
      );
      return redirect('/profile/'. auth()->user()->id);
    //    dd(request()->all());
   
    }

 
    public function show( Post $post)
    {
      // dd($post);
      return view('posts.show', compact('post'));
    }
}
 