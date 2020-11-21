@extends('adminlte::page')

@push('css')
<link rel="stylesheet" href="{{ asset('css/all.css') }}">
@yield('main_css')
@endpush

@section('content_top_nav_right')
@if (count(config('app.languages')) > 1)
<li class="nav-item dropdown">
  <a href="#" class="nav-link" data-toggle="dropdown">
    <img class="mb-1" src="{{ asset('img/flags/' . app()->getLocale() . '.png') }}" alt="{{ trans('adminlte::adminlte.languages.' . app()->getLocale()) }}" style="width: 1.2rem;">
    {{-- <span class="d-none d-md-inline">
          {{ trans('adminlte::adminlte.languages.' . app()->getLocale()) }}
    </span> --}}
  </a>
  <div class="dropdown-menu dropdown-menu-right">
    @foreach (config('app.languages') as $i => $langLocale)
    <a href="/setlocale/{{ $langLocale }}" class="dropdown-item">
      <!-- Message Start -->
      <div class="media">
        <img src="{{ asset('img/flags/' . $langLocale . '.png') }}" class="mr-2" style="width: 1.5rem;">
        <div class="media-body">
          <p class="dropdown-item-title">
            {{ trans('adminlte::adminlte.languages.' . $langLocale) }}
          </p>
        </div>
      </div>
      <!-- Message End -->
    </a>

    @if ($i < count(config('app.languages')) - 1) <div class="dropdown-divider">
  </div>
  @endif

  @endforeach
  </div>
</li>
@endif

@endsection
