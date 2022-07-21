@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9 offset-1">
            <div class="row">
                <div class="col-4">
                    <img class="rounded-circle  mt-4 px-4 w-100" src="{{$user->profile->profileImage()}}" alt="alternate">
                </div>
                <div class="col-8">
                    <div class="d-flex justify-content-between my-4">
                        <h2>{{$user->username}}</h2>
                        @cannot ('update',$user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @endcannot
                        @can ('update',$user->profile)
                        <a class="btn" href="/profile/{{$user->id}}/edit">Edit Profile</a>
                        <a class="btn" href="/p/create">Add Post</a>
                        @endcan
                    </div>
                    <div class="row d-flex mb-3">
                        <h4>{{$user->posts->count()}} posts {{$user->profile->followers->count()}} followers {{$user->following->count()}} following</h4>
                    </div>
                    <div class="row">
                        <div><h3>{{$user->profile->title}}</h3></div>
                        <div>{{$user->profile->bio}}</div>
                        <div>{{$user->profile->url}}</div>
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                @foreach($user->posts as $post)
                <div class="col-4 mb-4">
                   <div><a href="/p/{{$post->id}}"><img style="width:260px;height:300px;" src="/storage/{{$post->image}}" alt=""></a></div> 
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection