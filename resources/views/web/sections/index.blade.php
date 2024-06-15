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

@section('scripts')
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
@endsection
