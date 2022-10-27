@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">فرم ثبت نام</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">نام</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last-name" class="col-md-4 col-form-label text-md-start">نام خانوادگی</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control @error('last-name') is-invalid @enderror" name="last-name" value="{{ old('last-name') }}" autocomplete="last-name" autofocus>

                                @error('last-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="father-name" class="col-md-4 col-form-label text-md-start">نام پدر</label>

                            <div class="col-md-6">
                                <input id="father-name" type="text" class="form-control @error('father-name') is-invalid @enderror" name="father-name" value="{{ old('father-name') }}" autocomplete="father-name" autofocus>

                                @error('father-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date-birth" class="col-md-4 col-form-label text-md-start">تاریخ تولد</label>

                            <div class="col-md-6">
                                <input id="date-birth" type="text" class="form-control @error('date-birth') is-invalid @enderror" name="date-birth" value="{{ old('date-birth') }}" autocomplete="date-birth" autofocus>
                                <div id="fileHelpId" class="form-text">فرمت صحیح تاریخ: yyyy/mm/dd</div>
                                @error('date-birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="national-code" class="col-md-4 col-form-label text-md-start">کدملی</label>

                            <div class="col-md-6">
                                <input id="national-code" type="text" class="form-control @error('national-code') is-invalid @enderror" name="national-code" value="{{ old('national-code') }}" autocomplete="national-code" autofocus>

                                @error('national-code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="degree" class="col-md-4 col-form-label text-md-start">آخرین مدرک تحصیلی</label>

                            <div class="col-md-6">

                                    <select class="form-select form-select-lg" name="degree" id="degree"  @error('degree') is-invalid @enderror>
                                        <option value="لیسانس">لیسانس</option>
                                        <option value="فوق لیسانس">فوق لیسانس</option>
                                        <option value="دکتری">دکتری</option>
                                        <option value="فوق دکتری">فوق دکتری</option>
                                    </select>
                                @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="university" class="col-md-4 col-form-label text-md-start">نام دانشگاه</label>

                            <div class="col-md-6">
                                <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" autocomplete="university" autofocus>

                                @error('university')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data-graduation" class="col-md-4 col-form-label text-md-start">تاریخ فارغ التحصیلی</label>

                            <div class="col-md-6">
                                <input id="data-graduation" type="text" class="form-control @error('data-graduation') is-invalid @enderror" name="data-graduation" value="{{ old('data-graduation') }}" autocomplete="data-graduation" autofocus>
                                <div id="fileHelpId" class="form-text">فرمت صحیح تاریخ: yyyy/mm/dd</div>
                                @error('data-graduation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="major" class="col-md-4 col-form-label text-md-start">رشته تحصیلی</label>
                            <div class="col-md-6">

                                <select class="form-select form-select-lg" name="major" id="major"  @error('major') is-invalid @enderror>
                                    <option value="نجوم">نجوم</option>
                                    <option value="مهندسی هوافضا">مهندسی هوافضا</option>
                                    <option value="زیست شناسی">زیست شناسی</option>
                                    <option value="فیزیک">فیزیک</option>
                                </select>

                                @error('major')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-start">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-start">تکرار رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 mt-5">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    ثبت اطلاعات
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
