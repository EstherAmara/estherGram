@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>

        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1> {{$user->username}} </h1>
                @cannot('update', $user->profile)
                    <button class="btn btn-primary"> Follow </button>
                @endcannot

                @can('update', $user->profile)
                    <a href="/post/create"> Add New Post</a>
                @endcan
            </div>

            <div>
                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
            </div>

            <div class="d-flex">
                <div class="pr-5"><strong> {{$user->posts->count()}} </strong> posts </div>
                <div class="pr-5"><strong> 23k </strong> followers </div>
                <div class="pr-5"><strong> 212 </strong> following </div>
            </div>

            <div class="pt-4 font-weight-bold"> {{$user->profile->title}} </div>
            <div> {{$user->profile->description}} </div>
            <div><a href="{{$user->profile->url}}"> {{$user->profile->url}} </a></div>
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
