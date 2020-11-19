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

  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <form id="frmEvent" method="POST" action="{{ route('event.store') }}">
        @csrf
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>{{ trans('adminlte::weevent.title_of_event') }}</label>
              <input name="title" type="text" class="form-control" placeholder="Enter ..." value="título do evento">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- textarea -->
            <div class="form-group">
              <label>Textarea</label>
              <textarea name="embedded_video" class="form-control" rows="3"
                placeholder="Enter ..."><iframe width="560" height="315" src="https://www.youtube.com/embed/7zFQRuCX9-k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></textarea>
            </div>
          </div>
        </div>


      </form>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button form="frmEvent" type="submit" class="btn btn-primary">CADASTRAR</button>
    </div>
  </div>

@stop

@section('css')

@stop

@section('js')

@stop
