@extends('web.layout')

@section('header')
    @include('web.layouts.header.without_middle_header')
@endsection

@section('content')

    @include('web.components.aboutClinic')

    @include('web.components.contact')

    @include('web.components.requisites')

    @include('web.components.map')

@endsection
