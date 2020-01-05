@extends('layouts.admin')

@section('content')


    <h1>Create User</h1>


    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', $roles, null, ['placeholder' => 'Pick a role', 'class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], null, ['placeholder' => 'Pick a status', 'class'=>'form-control']) !!}
    </div>

    <div class="form-group col-4">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', ['class'=>'form-control-file']) !!}
    </div>




    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}




    <div class="row">
        @include('includes.form_error')
    </div>

    @endsection
