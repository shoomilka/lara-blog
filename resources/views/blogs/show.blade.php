@extends('app')

@section('content')
<div class="container">

    <h1>Blog {{ $blog->id }}
        <a href="{{ url('/blog/' . $blog->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit blog"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['/blog', $blog->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete blog',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $blog->id }}</td>
                </tr>
                <tr>
                    <th> Title </th>
                    <td> {{ $blog->title }} </td>
                </tr>
                <tr>
                    <th> Posted at </th>
                    <td> {{ $blog->posted_at }} </td>
                </tr>
                <tr>
                    <th> Photo </th>
                    <td><img src="/{{ $blog->photo }}"/></td>
                </tr>
                <tr>
                    <th> Body </th>
                    <td> {!! strip_tags($blog->body, '<br /><br>') !!} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
