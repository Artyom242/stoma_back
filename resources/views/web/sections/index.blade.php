@extends('web.layout')

@section('header')
    @include('web.layouts.header.full_header')
@endsection

@section('content')

    @include('web.components.services_list')

    @include('web.components.index_about_us')

    @include('web.components.calendar')

    @include('web.components.index_feedbacks')

    @include('web.components.motivations')

    @include('web.components.map')

@endsection
