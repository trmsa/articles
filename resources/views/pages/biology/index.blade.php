@extends('layouts.app')
@section('content')

    <p class="py-4 text-center">مقالات رشته زیست شناسی</p>
    <div class="card-group mt-4">
        <div class="container">
            <div class="row g-4">

                @foreach ($biologies as $biology)
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{ $biology->indicator_img }}"
                                alt="Card image cap">
                            <div class="card-body card-main">
                                <h4 class="card-title">{{ $biology->title }}</h4>
                                <p class="card-text">{{ Str::limit($biology->abstract, 300, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="data">ویرایش شده در تاریخ : {{ $biology->updated_at }}</p>
                                <p class="data">ایجاد شده در تاریخ : {{ $biology->created_at }}</p>
                            </div>
                            <a href="{{ route('biologys.show', ['biology' => $biology->id]) }}" class="btn btn-sm btn-primary">نمایش</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('sections.footer')
@endsection