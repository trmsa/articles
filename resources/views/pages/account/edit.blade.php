@extends('layouts.app')
@section('content')

    @component('components.account-icons')
        @slot('createRoute')
        href="{{ route($routeName.'.create') }}"
        @endslot

        @slot('articlesRoute')
            href="{{ route('account.index') }}"
        @endslot

        @slot('profileRoute')
            href="{{ route('account.edit') }}"
        @endslot

        @slot('main_dashbord')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">درخواست ارتقاء مدرک</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('account.update', ['user'=>$user->id]) }}" enctype="multipart/form-data">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="degree" class="col-md-4 col-form-label text-md-start">مدرک تحصیلی</label>
        
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
                                        <input id="data-graduation" type="text" class="form-control @error('data_graduation') is-invalid @enderror" name="data_graduation" value="{{ old('data_graduation') }}" autocomplete="data-graduation" autofocus>
                                        <div id="fileHelpId" class="form-text">فرمت صحیح تاریخ: yyyy/mm/dd</div>
                                        @error('data_graduation')
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
                                    <label for="img-degree" class="col-md-4 col-form-label text-md-start">بارگذاری تصویر مدرک
                                        تحصیلی</label>
    
                                    <div class="col-md-6">
                                        <input id="img-degree" type="file"
                                            class="form-control @error('img_degree') is-invalid @enderror" name="img_degree"
                                            value="{{ old('img_degree') }}" autocomplete="img-degree" autofocus>
                                        @error('img_degree')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
        
                                <div class="row mb-0 mt-5">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            ارسال
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endslot
    @endcomponent



    @include('sections.footer')
@endsection
