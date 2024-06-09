@extends('web.layout')

@section('header')
    @include('web.layouts.header.without_middle_header')
@endsection

@section('content')

    @include('web.components.price')

    @include('web.components.map')

@endsection

@section('scripts')
    @vite(['resources/js/app.js'])
@endsection
