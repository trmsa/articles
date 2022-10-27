@extends('layouts.app')
@section('content')

    @component('components.admin-icons')
        @slot('main_dashbord')
       
        <div class="card">
            <div class="card-header text-center">ایجاد یا ویرایش ارتباط با ما</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.contact.edit') }}">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <label for="tel_manag" class="col-md-2 col-form-label text-md-start">تلفن مدیریت</label>

                        <div class="col-md-10">
                            <input id="tel_manag" type="text" class="form-control @error('tel_manag') is-invalid @enderror"
                                name="tel_manag" @if ($contact)
                                    value="{{ $contact->tel_manag }}"
                                    @else
                                    value="{{ old('tel_manag') }}"
                                @endif autocomplete="tel_manag" autofocus>

                            @error('tel_manag')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tel_public" class="col-md-2 col-form-label text-md-start">تلفن روابط عمومی</label>

                        <div class="col-md-10">
                            <input id="tel_public" type="text" class="form-control @error('tel_public') is-invalid @enderror"
                                name="tel_public" @if ($contact)
                                    value="{{ $contact->tel_public }}"
                                    @else
                                    value="{{ old('tel_public') }}"
                                @endif autocomplete="tel_public" autofocus>

                            @error('tel_public')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tel_deputy" class="col-md-2 col-form-label text-md-start">تلفن معاونت</label>

                        <div class="col-md-10">
                            <input id="tel_deputy" type="text" class="form-control @error('tel_deputy') is-invalid @enderror"
                                name="tel_deputy" @if ($contact)
                                    value="{{ $contact->tel_deputy }}"
                                    @else
                                    value="{{ old('tel_deputy') }}"
                                @endif autocomplete="tel_deputy" autofocus>

                            @error('tel_deputy')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-2 col-form-label text-md-start">ایمیل</label>

                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" @if ($contact)
                                    value="{{ $contact->email }}"
                                    @else
                                    value="{{ old('email') }}"
                                @endif autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="postal_code" class="col-md-2 col-form-label text-md-start">کدپستی</label>

                        <div class="col-md-10">
                            <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                name="postal_code" @if ($contact)
                                    value="{{ $contact->postal_code }}"
                                    @else
                                    value="{{ old('postal_code') }}"
                                @endif autocomplete="postal_code" autofocus>

                            @error('postal_code')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-2 col-form-label text-md-start">آدرس</label>

                        <div class="col-md-10">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" @if ($contact)
                                    value="{{ $contact->address }}"
                                    @else
                                    value="{{ old('address') }}"
                                @endif autocomplete="address" autofocus>

                            @error('address')
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
