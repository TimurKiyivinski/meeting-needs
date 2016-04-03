@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-success">
        <div class="panel-body">
        {{ $event['data'] }}
        </div>
        <div class="panel-footer">
            Volunteers: {{ count($event['users']) }}
        </div>
    </div>
    @if(count($participation))
        <button id="btn-devolunteer" data-url="{{ route('api::userevent.destroy', $participation['id']) }}" class="btn btn-danger btn-url">Opt Out</button>
    @else
        <button id="btn-volunteer" data-url="{{ route('api::userevent.store') }}" data-event="{{ $event['id'] }}" data-user="{{ $user['id'] }}" class="btn btn-success btn-url">Volunteer</button>
    @endif
</div>
@stop

@section('script_extra')
    <script src="{{ asset('js/event.js') }}" ></script>
@stop
