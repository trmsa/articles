@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <p class="titr mt-5">موضوع:</p>
            <h2 class="title">{{ $cosmology->title }}</h2>
            <p class="titr mt-5">خلاصه:</p>
            <p>{{ $cosmology->abstract }}</p>
            <p class="titr mt-5">متن مقاله:</p>
            <p>{{ $cosmology->body }}</p>
        </div>
    </div>


    <div class="container container-gallery mt-5">
        <h4 class="my-3 text-center">گالری تصاویر</h4>
        <div class="row">
            @foreach ($cosmologyImages as $img)
            <div class="col-md-4 gallery mt-4">
                <img src="{{ asset('images/'. $img->url) }}">
            </div>
            @endforeach
        </div>
    </div>
    

    @include('sections.footer')
@endsection
