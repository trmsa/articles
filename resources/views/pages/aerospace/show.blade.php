@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <p class="titr mt-5">موضوع:</p>
            <h2 class="title">{{ $aerospace->title }}</h2>
            <p class="titr mt-5">خلاصه:</p>
            <p>{{ $aerospace->abstract }}</p>
            <p class="titr mt-5">متن مقاله:</p>
            <p>{{ $aerospace->body }}</p>
        </div>
    </div>


    <div class="container container-gallery mt-5">
        <h4 class="my-3 text-center">گالری تصاویر</h4>
        <div class="row">
            @foreach ($aerospaceImages as $img)
            <div class="col-md-4 gallery mt-4">
                <img src="{{ asset('images/'. $img->url) }}">
            </div>
            @endforeach
        </div>
    </div>
    

    @include('sections.footer')
@endsection
