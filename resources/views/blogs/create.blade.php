@extends('app')

@section('content')
<div class="container">

    <h1>Create New blog</h1>
    <hr/>

    {!! Form::open(['url' => '/blog', 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body', 'Body', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('pic') ? 'has-error' : ''}}">
                {!! Form::label('pic', 'Photo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="btn btn-default btn-file">
                        {!! Form::file('pic') !!}
                    </label>
                    {!! $errors->first('pic', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('posted_at') ? 'has-error' : ''}}">
                {!! Form::label('posted_at', 'Posted time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('posted_at', null, ['class' => 'form-control', 'id' => 'datetimepicker']) !!}
                    {!! $errors->first('posted_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection