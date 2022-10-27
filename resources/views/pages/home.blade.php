@extends('layouts.app')

@section('content')
    <div class="alert-custom-success d-flex justify-content-center"> {{ session('upload-success') }} </div>
    <div class="alert-custom-danger d-flex justify-content-center"> {{ session('not-active') }} </div>
    @include('sections.home.carousel')
    @include('sections.home.main')
    @include('sections.footer')
@endsection
