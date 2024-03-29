@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" style="max-height: 120px;" class="rounded-circle">
  
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline ">
              <div class=" d-flex align-items-center pb-4">
                <div class="h3"><strong> {{ $user->username }}</strong></div> 
                 <follow-button> </follow-button>
              </div>
               
                @can('update', $user->profile)
                  <a href="/p/create">Add new Post</a>
                @endcan
                
            </div>
            @can('update', $user->profile)
               <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>               
            @endcan

            <div class="d-flex">
                <div class="p-3"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="p-3"><strong>55k</strong> Followers</div>
                <div class="p-3"><strong>212</strong> Following</div>

            </div>
            <div class="pt-2 font-weight-bold"><strong>{{ $user->profile->title }}</strong> </div>
            <div>{{ $user->profile->description }}</div>
             <div><a href="#">{{ $user->profile->url ?? "Not available url"}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post )
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </a>

        </div>
            
        @endforeach
         
    

    </div>
</div>

@endsection
