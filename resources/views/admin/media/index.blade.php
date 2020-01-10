@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Image</th>
            <th></th>
        </tr>
        </thead>

        @if($photos)
            <tbody>

            @foreach($photos as $photo)

                <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->filename}}</td>
                    <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                    <td><img src="{{$photo->filename}}" alt="" height="100"></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>

        @endif

    </table>


    @endsection
