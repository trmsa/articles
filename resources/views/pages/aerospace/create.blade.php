@extends('layouts.app')
@section('content')

    @component('components.account-icons')
        @slot('createRoute')
            href="{{ route('aerospaces.create') }}"
        @endslot

        @slot('articlesRoute')
            href="{{ route('account.index') }}"
        @endslot

        @slot('profileRoute')
            href="{{ route('account.edit') }}"
        @endslot

        @slot('main_dashbord')
            @component('components.create-article')
                @slot('route')
                    action="{{ route('aerospaces.store') }}"
                @endslot
            @endcomponent
        @endslot
    @endcomponent

    @include('sections.footer')
@endsection
