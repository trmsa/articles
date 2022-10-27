@extends('layouts.app')
@section('content')

        <div class="container">
            <div class="row about-style">
                <p class="mt-5">تلفن مدیریت: {{$contact->tel_manag}}</p>
                <p>تلفن معاونت پشتیبانی: {{$contact->tel_deputy}}</p>
                <p>تلفن روابط عمومی: {{$contact->tel_public}}</p>
                <p>آدرس ایمیل: {{$contact->email}}</p>
                <p>آدرس پستی: {{$contact->postal_code}}</p>
                <p>نشانی: {{$contact->address}}</p>
            </div>
        </div>

    @include('sections.footer')
@endsection