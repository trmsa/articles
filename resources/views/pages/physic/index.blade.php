@extends('layouts.app')
@section('content')

    <p class="py-4 text-center">مقالات رشته فیزیک</p>
    <div class="card-group mt-4">
        <div class="container">
            <div class="row g-4">

                @foreach ($physics as $physic)
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{ $physic->indicator_img }}"
                                alt="Card image cap">
                            <div class="card-body card-main">
                                <h4 class="card-title">{{ $physic->title }}</h4>
                                <p class="card-text">{{ Str::limit($physic->abstract, 300, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="data">ویرایش شده در تاریخ : {{ $physic->updated_at }}</p>
                                <p class="data">ایجاد شده در تاریخ : {{ $physic->created_at }}</p>
                            </div>
                            <a href="{{ route('physics.show', ['physic' => $physic->id]) }}" class="btn btn-sm btn-primary">نمایش</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('sections.footer')
@endsection