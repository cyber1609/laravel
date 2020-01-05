@extends('layouts.admin')


@section('content')
    <h1>Users</h1>

    @if(Session::has('user_created'))
        <p class="alert-info">{{session('user_created')}}</p>
    @endif
    @if(Session::has('user_updated'))
        <p class="alert-success">{{session('user_updated')}}</p>
    @endif
    @if(Session::has('user_deleted'))
        <p class="alert-danger">{{session('user_deleted')}}</p>
    @endif


    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        @if($users)
            <tbody>

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td><img src="{{$user->photo? $user->photo->filename : '/images/nophoto.jpg'}}" alt="" height="50"></td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active ==0 ? 'Inactive' : 'Active' }}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>

                @endforeach
            </tbody>

            @endif

    </table>

    @endsection
