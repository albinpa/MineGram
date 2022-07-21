@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-9 offset-1">
        
        <div class="row">
        
            <div class="col-7">
            @foreach($posts as $post)
                <div class="card mb-4">
                    <div class="card-header d-flex">
                    <div><img class="rounded-circle profile-img-smaller" src="{{$post->user->profile->profileImage()}}" alt="alternate"></div>
                    <div ><a class="profile-link" href="/profile/{{$post->user->id}}"><h6 class="profile-name-small">{{$post->user->username}}</h6></a></div>
                    </div>
                    <div class="card-body px-0 py-0">
                    <img style="width: 472px;" src="/storage/{{$post->image}}" alt="">
                    </div>
                    <div class="card-footer">
                     <h5 class="profile-name-small">{{$post->caption}}</h5>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="col mt-2 pt-1">
                <div class="row">
                    <div class="col-4">
                    <img class="rounded-circle profile-img-small" src="{{$user->profile->profileImage()}}" alt="alternate">
                    </div>
                    <div class="col-8 profile-div">
                    <a class="profile-link" href="/profile/{{$user->id}}"><h4 class="profile-name-smaller">{{$user->username}}</h4></a>
                    <h4 class="profile-title">{{$user->profile->title}}</h4>
                    </div>
                </div>
            

            </div>
        </div>
        
       
    </div>
</div>
</div>

@endsection