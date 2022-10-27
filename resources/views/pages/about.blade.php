@extends('layouts.app')
@section('content')

   
        <div class="container">
            <div class="row about-style">
                <h3 class="mt-4">{{ $about->title }}</h3>
                <p>{{ $about->body }}</p>
                <span class="text-center">{{ $about->end }}</span>
            </div>
        </div>

    @include('sections.footer')
@endsection
