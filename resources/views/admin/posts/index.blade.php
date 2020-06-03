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
            <th>Comments</th>
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
                    <td>
                        @if($post->user)
                            <a href="{{route('users.edit', $post->user->id)}}">{{$post->user->name}}</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{$post->category? $post->category->name : 'Uncategorized'}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{Str::limit($post->body, 30)}}</td>
                    <td><a href="{{route('comments.show', $post->id)}}">View comments</a></td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>

            @endforeach
            </tbody>

        @endif

    </table>

@endsection
