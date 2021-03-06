@extends('header')

@section('content')
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
    <div class="row">
        <a href="{{ url()->previous() }}"><button type="button" class= " btn btn-primary ms-5">Back</button></a>
    </div>
@endsection