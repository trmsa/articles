@extends('layouts.app')
@section('content')

@component('components.account-icons')

        @slot('createRoute')
        href="{{ route('biologys.create') }}"
        @endslot

        @slot('articlesRoute')
        href="{{ route('account.index') }}"
        @endslot

        @slot('profileRoute')
        href="{{ route('account.edit') }}"
        @endslot


        @slot('main_dashbord')
        @component('components.edit-article')
            @slot('route')

            action="{{ route('biologys.update', ['biology' => $article->id]) }}"

            @endslot

            @slot('articleTitle')
            value="{{ $article->title }}"
            @endslot

            @slot('articleAbstract')
            {{ $article->abstract }}
            @endslot

            @slot('articleBody')
            {{ $article->body }}
            @endslot

            {{-- @slot('src')
            src="{{ storage_path('\app\'.$article->indicator_img) }}"
            @endslot --}}

        @endcomponent
        @endslot
     @endcomponent
 
     @include('sections.footer')
 @endsection