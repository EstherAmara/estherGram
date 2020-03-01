@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3 p-5">
            <img src="https://scontent-los2-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-los2-1.cdninstagram.com&_nc_ohc=qNYP8jXEMgoAX-yf-5c&oh=19cd5e5316c049151f4a0d4653819a21&oe=5ECEBCBA" class="rounded-circle">
        </div>

        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1> {{$user->username}} </h1>
                <a href="/post/create"> Add New Post</a>
            </div>

            <div>
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            </div>

            <div class="d-flex">
                <div class="pr-5"><strong> {{$user->posts->count()}} </strong> posts </div>
                <div class="pr-5"><strong> 23k </strong> followers </div>
                <div class="pr-5"><strong> 212 </strong> following </div>
            </div>

            <div class="pt-4 font-weight-bold"> {{$user->profile->title}} </div>
            <div> {{$user->profile->description}} </div>
            <div><a href="#"> {{$user->profile->url}} </a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $item)
            <div class="col-4 p-3">
                <a href="/post/{{$item->id}}">
                    <img src="/storage/{{$item->image}}" alt="" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
