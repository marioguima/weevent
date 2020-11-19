@extends('admin.main')

@section('title')
  {{ trans('adminlte::weevent.event') }}
@endsection

@section('adminlte_css')
  <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@endsection

@section('content_header')

  <div class="row mb-2">
    <div class="col-12">
      <h1>@lang('adminlte::weevent.event')</h1>
    </div>
  </div>
@stop

@section('content')

  <div class="row">
    <div class="col">
      <h3>{{ $event->title }}</h3>
    </div>
  </div>
  <div class="row">
    <div class="col">
      {!! $event->embedded_video !!}
    </div>
  </div>
  <div class="row">
    <div class="col">
      Criado: {{ date('d/m/Y H:i', strtotime($event->created_at)) }}
    </div>
  </div>

@stop

@section('css')

@stop

@section('js')

@stop
