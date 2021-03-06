@extends('header')

@section('content')
<h1 class="text-center mt-3">Home page</h1>
<div class="row border bg-warning">
    <div class="col-7">
        <a href="{{route('post.create')}}"><button type="button" class="btn btn-primary mt-2">New Post</button></a>
    </div>
    <div class="col-4">
        <form action="{{route('search')}}" method="get">
            <div class="input-group m-2">
                <select class="form-control form-select" name="tag" @foreach ($tags as $tag)>
                    <option value="{{$tag -> id}}">{{$tag -> tagname}}</option>
                @endforeach
                </select>
                <button type="submit" class="btn btn-outline-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
    <div class="col-1">
        <a href="{{route('login')}}"><button type="button" class="btn btn-primary mt-2">Login</button></a>
    </div>
</div>
    <div class="row">   
        @foreach ($posts as $post)
            <div class="col-xl-4 col-md-6 col-s-12">
                <div class="card m-3">
                    <div class="card-header">
                    Dream4sysBlog
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->short}}</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('post.show', $post->id)}}"><button type="button" class="btn btn-primary m-1">Read</button></a>
                            <a href="{{route('post.edit', $post->id)}}"><button type="button" class="btn btn-warning m-1">Edit</button></a>
                            <form action="{{route('post.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn me-2 btn-danger m-1">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        @endforeach
    </div>
@endsection