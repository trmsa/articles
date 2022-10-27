@extends('layouts.app')
@section('content')

    @component('components.account-icons')
        @slot('createRoute')
            href="{{ route($routeName . '.create') }}"
        @endslot

        @slot('articlesRoute')
            href="{{ route('account.index') }}"
        @endslot

        @slot('profileRoute')
            href="{{ route('account.edit') }}"
        @endslot

        @slot('main_dashbord')
            <p class="text-center mb-4">مقالات ایجاد شده توسط شما </p>

            <div class="alert-custom-success d-flex justify-content-center"> {{ session('changed-password') }} </div>
            <div class="alert-custom-success d-flex justify-content-center"> {{ session('upgrade') }} </div>
            <div class="alert-custom-success d-flex justify-content-center"> {{ session('create-success') }} </div>
            <div class="alert-custom-success d-flex justify-content-center"> {{ session('update-success') }} </div>
            <div class="alert-custom-success d-flex justify-content-center"> {{ session('deleted') }} </div>

            <div class="card-group mt-4">
                <div class="container-fluid">
                    <div class="row g-4">
                        @foreach ($articles as $article)
                            <div class="col-sm-6">
                                <div class="card">
                                    <img class="card-img-top" src="/storage/{{ $article->indicator_img }}" alt="Card image cap">
                                    <div class="card-body card-main">
                                        <h4 class="card-title">{{ $article->title }}</h4>
                                        <p class="card-text">{{ Str::limit($article->abstract, 300, '...') }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <div class="date">
                                        <p class="data">ویرایش شده در تاریخ : {{ $article->updated_at }}</p>
                                        <p class="data">ایجاد شده در تاریخ : {{ $article->created_at }}</p>
                                        </div>

                                        <div class="d-flex align-items-center">

                                        <a href="{{ route($routeName . '.show', [$routeParam => $article->id]) }}"
                                            class="btn btn-sm btn-primary">نمایش</a>

                                        <a href="{{ route($routeName . '.edit', [$routeParam => $article->id]) }}"
                                            class="btn btn-sm btn-primary mx-2">ویرایش</a>

                                        <form action="{{ route($routeName . '.destroy', [$routeParam => $article->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </div>

                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endslot
    @endcomponent



    @include('sections.footer')
@endsection
