@extends('layouts.app')

@section('content')
<div class="container">
@foreach($recipients as $recipient)
    <div class="col-xs-12 col-md-6">
        <a href="{{ route('app::recipient.show', $recipient['id'])}}">
        <div class="panel panel-primary">
            <div class="panel-body panel-body-image" style="background-image: url('{{ asset($recipient['photo']['path']) }}');">
            </div>
            <div class="panel-footer">
                {{ $recipient['title'] }}
            </div>
        </div>
        </a>
    </div>
@endforeach
</div>
@stop
