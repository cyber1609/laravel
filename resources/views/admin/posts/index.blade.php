@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    @if(Session::has('post_created'))
        <p class="alert-info">{{session('post_created')}}</p>
    @endif
    @if(Session::has('post_updated'))
        <p class="alert-success">{{session('post_updated')}}</p>
    @endif
    @if(Session::has('post_deleted'))
        <p class="alert-danger">{{session('post_deleted')}}</p>
    @endif


    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>

        @if($posts)
            <tbody>

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->photo? $post->photo->filename : '/images/nophoto.jpg'}}" alt="" height="50"></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>

            @endforeach
            </tbody>

        @endif

    </table>

@endsection
