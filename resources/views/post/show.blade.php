@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-2">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">
                                    {{$post->user->username}}
                                </span>
                            </a>
                            <a href="http://" class="pl-2"> Follow </a>
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                         <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark"> {{$post->user->username}} </span>
                        </a>
                    </span> {{$post->caption}}

                    <hr>

                    <form action="/comment" method="POST">

                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div>Add a comment ....</div>
                                </div>
                                <div class="form-group row">
                                    <input type="text" class="form-control @error('comments') is-invalid @enderror col-8" name="comments" value="{{ old('comments') }}" autocomplete="comments" autofocus>
                                    <button type="submit" class="btn btn-primary col-4"> Comment </button>

                                    @error('comments')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                @foreach ($comments as $comment)
                                    <a href="/profile/{{$comment->user->id}}">
                                        <span class="text-dark"> <b>{{$comment->user->username}}</b> </span>
                                    </a>
                                    {{$comment->comments}} <br>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
