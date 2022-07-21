@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-9 offset-1">
        <div class="row">
            <div class="col">
            <img style="width:600px;" src="/storage/{{$post->image}}" alt="">
            </div>
            <div class="col">
            <h2>{{$post->user->username}}</h2>
            
            </div>
        </div>
    </div>
</div>
</div>

@endsection