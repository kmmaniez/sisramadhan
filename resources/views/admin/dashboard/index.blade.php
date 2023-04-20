@extends('layouts.admin')

@section('content')
    <div class="container">
      <h1>{{ Auth::user()->name ?? '-' }}</h1>
      <h3>{{ Auth::user()->email ?? '-'}}</h3>
      <h5>{{ Auth::user()->roles->nama_role ?? '-'}}</h5>
    </div>
@endsection
