@extends('layouts.app')
@section('content')

    @component('components.admin-icons')
        @slot('main_dashbord')
        <div class="alert-custom-success d-flex justify-content-center"> {{ session('create-success') }} </div>
        <div class="alert-custom-success d-flex justify-content-center"> {{ session('changed-password') }} </div>
        <div class="alert-custom-success d-flex justify-content-center"> {{ session('about') }} </div>
        <div class="alert-custom-success d-flex justify-content-center"> {{ session('contact') }} </div>
        
        <p class="text-center mb-4">مقالات ایجاد شده توسط شما در رشته:</p>
        

            @include('sections.admin.articles-link')

        @endslot
    @endcomponent



    @include('sections.footer')
@endsection
