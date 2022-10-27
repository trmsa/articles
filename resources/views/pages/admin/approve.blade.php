@php
    $count = 0;
@endphp
@extends('layouts.app')
@section('content')

    @component('components.admin-icons')
        @slot('main_dashbord')
        <div class="alert-custom-success d-flex justify-content-center"> {{ session('confirm-user') }} </div>
        <div class="alert-custom-danger d-flex justify-content-center"> {{ session('delete-user') }} </div>
            <div class="table-responsive">
                <table
                    class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                    <thead class="table-light">
                        <caption>لیست کاربران تایید نشده</caption>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>نام پدر</th>
                            <th>تاریخ تولد</th>
                            <th>کدملی</th>
                            <th>مدرک تحصیلی</th>
                            <th>دانشگاه</th>
                            <th>رشته تحصیلی</th>
                            <th>تاریخ فارغ التحصیلی</th>
                            <th>وضعیت</th>
                            <th>دانلود تصویر مدرک</th>
                            <th>تایید</th>
                            <th>رد</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($users as $user)
                        @php
                            $count++
                        @endphp
                            <tr class="table-primary">
                                <td scope="row">{{$count}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->father_name }}</td>
                                <td>{{ $user->date_birth }}</td>
                                <td>{{ $user->national_code }}</td>
                                <td>{{ $user->degree }}</td>
                                <td>{{ $user->university }}</td>
                                <td>{{ $user->major }}</td>
                                <td>{{ $user->data_graduation }}</td>
                                <td>{{ $user->status }}</td>
                                @if ($user->img_degree)
                                <td><form action="{{ route('admin.download', ['file' => $user->img_degree]) }}" method="POST">@csrf <button class="btn btn-info btn-sm">دانلود</button></form></td>
                                @else
                                <td>بارگذاری نشده</td>
                                @endif
                                <td><form action="{{ route('admin.confirmUser', ['user' => $user->id]) }}" method="POST"> @csrf <button class="btn btn-primary btn-sm">تایید</button></form></td>
                                <td><form action="{{ route('admin.notApprovedUser', ['user' => $user->id]) }}" method="POST">@csrf @method('delete')<button class="btn btn-danger btn-sm">حذف</button></form></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        @endslot
    @endcomponent



    @include('sections.footer')
@endsection
