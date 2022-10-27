<div class="container">
    <div class="row">
        <div class="col-md-2 account-options-container ">
            <div class="options d-flex">
                <ul class="list-group-account">
                    <li class="list-item-account pt-3"><a href="{{ route('admin.index') }}">مقالات شما</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.create') }}">ایجاد مقاله</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.users') }}">کاربران تایید شده</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.approve') }}">کاربران تایید نشده</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.upgrade.degree') }}">درخواست های ارتقاء مدرک</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.password') }}">تغییر رمز عبور</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.contact') }}">ارتباط با ما</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('admin.about') }}">درباره ما</a></li>
                </ul>
            </div>
        </div>
        <div id="main-admin" class="col-md-10">

            {{$main_dashbord}}
            
        </div>


    </div>
</div>