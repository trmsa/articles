@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="alert-custom-success mt-4 d-flex justify-content-center"> {{ session('upload-fail') }} </div>

                    <div class="card-header text-center">فرم ثبت نام</div>

                    <div class="card-body">

                        <form action="{{ route('upload.store') }}" enctype="multipart/form-data" method="POST">

                            @csrf

                            <div class="row mb-3">
                                <label for="img-degree" class="col-md-4 col-form-label text-md-start">بارگذاری تصویر مدرک
                                    تحصیلی</label>

                                <div class="col-md-6">
                                    <input id="img-degree" type="file"
                                        class="form-control @error('img-degree') is-invalid @enderror" name="img-degree"
                                        value="{{ old('img-degree') }}" autocomplete="img-degree" autofocus>
                                    @error('img-degree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0 mt-5">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت نهایی
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
