<div class="container">
    <div class="row">
        <div class="col-md-2 account-options-container ">
            <div class="options d-flex">
                <ul class="list-group-account">
                    <li class="list-item-account pt-3"><a {{$articlesRoute}}>مقالات شما</a></li>
                    <li class="list-item-account pt-3"><a {{$createRoute}}>ایجاد مقاله</a></li>
                    <li class="list-item-account pt-3"><a {{$profileRoute}}>ارتقاء مدرک</a></li>
                    <li class="list-item-account pt-3"><a href="{{ route('password.form') }}">تغییر رمز عبور</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">

            {{$main_dashbord}}
            
        </div>


    </div>
</div>