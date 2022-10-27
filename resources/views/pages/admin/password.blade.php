@extends('layouts.app')
@section('content')

    @component('components.admin-icons')
        @slot('main_dashbord')

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert-custom-danger d-flex justify-content-center">{{ session('fail-password') }}</div>
                        <div class="card">
                            <div class="card-header text-center">تغییر رمز عبور</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.password.update', ['user' => $user->id]) }}">
                                    @method('put')
                                    @csrf


                                    <div class="row mb-3">
                                        <label for="old-password" class="col-md-4 col-form-label text-md-start">رمز عبور
                                            فعلی</label>

                                        <div class="col-md-6">
                                            <input id="old-password" type="password"
                                                class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                                autocomplete="new-password">

                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-start">رمز عبور جدید</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-start">تکرار رمز
                                            عبور</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0 mt-5">
                                        <div class="col-md-6 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                تغییر رمز
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
