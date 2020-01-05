@extends('layouts.admin')


@section('content')
    <h1>Users</h1>


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
                    <td><img src="{{$user->photo? $user->photo->filename : '/images/users/nophoto.jpg'}}" alt="" height="50"></td>
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
