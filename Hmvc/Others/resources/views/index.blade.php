@extends('others::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('others.name') !!}</p>
@endsection
