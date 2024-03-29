<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

 public function index( User $user)
 {
    //  $user = User::findorFail($user);

     return view('profiles.index',compact('user'));
 }
 public function edit(User $user)
 {
   $this->authorize('update', $user->profile);
   return view('profiles.edit', compact('user'));

 }
 public function update( User $user)
 {
    $this->authorize('update', $user->profile);
      $data = request()->validate([
        'title'=>'required',
        'description'=>'required',
        'url'=>'url',
        'image'=>'',

      ]);
      if(request('image')){
        $imagePath= request('image')->store('profile','public');
        //  $image= Image::make(public_path('storage/{"$imagePath"}'))->fit(1000, 1000);
        //  $image->save();
        $imageArray= ['image'=>$imagePath];
      }
      // dd(array_merge(
      //   $data,
      //   ['image'=> $imagePath]));
      // $user->profile->update($data);

      auth()->user()->profile->update(array_merge(
        $data,
        $imageArray ?? []
        
      ));
      return redirect("/profile/{$user->id}");   

      // dd($data);

 }
} 
