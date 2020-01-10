@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

    @endsection


@section('content')

    <h1>Media Upload</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class' => 'dropzone']) !!}

{{--    <div class="form-group col-4">--}}
{{--        {!! Form::label('photo_id', 'Photo:') !!}--}}
{{--        {!! Form::file('photo_id', ['class'=>'form-control-file']) !!}--}}
{{--    </div>--}}

{{--    <div class="form-group">--}}
{{--        {!! Form::submit('Upload Photo', ['class'=>'btn btn-primary']) !!}--}}
{{--    </div>--}}

    {!! Form::close() !!}


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>



    @endsection
