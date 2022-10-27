@extends('layouts.app')
@section('content')

    @component('components.admin-icons')
        @slot('main_dashbord')
       
        <div class="card">
            <div class="card-header text-center">ایجاد یا ویرایش درباره ما</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.about.edit') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <label for="title" class="col-md-2 col-form-label text-md-start">عنوان</label>

                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" @if ($about)
                                    value="{{ $about->title }}"
                                    @else
                                    value="{{ old('title') }}"
                                @endif autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="body" class="col-md-2 col-form-label text-md-start">متن</label>

                        <div class="col-md-10">
                            <textarea id="body" rows="20" type="text" class="form-control @error('body') is-invalid @enderror"
                                name="body" autocomplete="body" autofocus>@if($about){{$about->body}}@else{{old('body')}}@endif</textarea>

                            @error('body')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="end" class="col-md-2 col-form-label text-md-start">پایان</label>

                        <div class="col-md-10">
                            <input id="end" type="text" class="form-control @error('end') is-invalid @enderror"
                                name="end" @if ($about)
                                    value="{{ $about->end }}"
                                    @else
                                    value="{{ old('end') }}"
                                @endif autocomplete="end" autofocus>

                            @error('end')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0 mt-5">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn btn-primary">
                                انتشار
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        @endslot
    @endcomponent



    @include('sections.footer')
@endsection
