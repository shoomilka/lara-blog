@extends('app')

@section('content')
<div class="container">

    <h1>Blogs <a href="{{ url('/blog/create') }}" class="btn btn-primary btn-xs" title="Add New blog"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
            
        @foreach($blogs as $item)
            <div class="col-md-10">
                <h1>{{ $item->title }}
                    <a href="{{ url('/blog/' . $item->id) }}" class="btn btn-success btn-xs" title="View blog"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                    <a href="{{ url('/blog/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit blog"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['/blog', $item->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete blog" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete blog',
                                'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}
                    {!! Form::close() !!}
                </h1>
                <h5>{{ $item->posted_at->format('d/m/Y H:i') }}</h5>
                <img src="{{ $item->photo }}" />
                <h3>{!! strip_tags($item->body, '<br /><br>') !!}</h3></pre>
            </div>
        @endforeach
        <div class="pagination-wrapper"> {!! $blogs->render() !!} </div>
</div>
@endsection
