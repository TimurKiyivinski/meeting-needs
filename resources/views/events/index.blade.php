@extends('layouts.app')

@section('content')
<div class="container">
@foreach($events as $event)
    <div class="col-xs-12 col-md-6">
        <a href="{{ route('app::event.show', $event['id'])}}">
        <div class="panel panel-primary">
            <div class="panel-body panel-body-image" style="background-image: url('{{ asset($event['photo']['path']) }}');">
            </div>
            <div class="panel-footer">
                {{ $event['title'] }}
            </div>
        </div>
        </a>
    </div>
@endforeach
</div>
@stop
