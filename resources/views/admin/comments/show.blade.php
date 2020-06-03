@extends('layouts.admin')


@section('content')

    <h1>Comments</h1>

    {{--    @if(Session::has('post_created'))--}}
    {{--        <p class="alert-info">{{session('post_created')}}</p>--}}
    {{--    @endif--}}
    {{--    @if(Session::has('post_updated'))--}}
    {{--        <p class="alert-success">{{session('post_updated')}}</p>--}}
    {{--    @endif--}}
    {{--    @if(Session::has('post_deleted'))--}}
    {{--        <p class="alert-danger">{{session('post_deleted')}}</p>--}}
    {{--    @endif--}}

    @if(count($comments) > 0)
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>User</th>
                {{--                <th>Category</th>--}}
                {{--                <th>Title</th>--}}
                <th>Body</th>
                <th>Created</th>
                {{--                <th>Updated</th>--}}
            </tr>
            </thead>


            <tbody>

            @foreach($comments as $comment)

                <tr>
                    <td>{{$comment->id}}</td>
                    {{--                    <td><img src="{{$post->photo? $post->photo->filename : '/images/nophoto.jpg'}}" alt="" height="50"></td>--}}
                    <td><a href="{{route('posts.edit', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                    <td>
                        @if($comment->user)
                            <a href="{{route('users.edit', $comment->user->id)}}">{{$comment->user->name}}</a>
                        @else
                            N/A
                        @endif
                    </td>


                    {{--                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>--}}
                    <td>{{Str::limit($comment->body, 30)}}</td>
                    <td>{{$comment->created_at}}</td>

                    @if($comment->is_active == 0)
                        <td>
                            {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            {{ Form::hidden('is_active', 1) }}
                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </td>
                    @else
                        <td>
                            {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            {{ Form::hidden('is_active', 0) }}
                            {!! Form::submit('Disapprove', ['class'=>'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </td>
                    @endif

                    <td>
                        {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>

                    {{--                    <td>{{$post->updated_at}}</td>--}}
                </tr>

            @endforeach
            </tbody>





        </table>
    @else

        <h1>No comments yet</h1>
    @endif
@endsection
