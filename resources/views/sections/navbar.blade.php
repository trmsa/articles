<nav class="navbar navbar-expand-lg bg-info px-4 sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"> <img src="{{ asset('images/logo.png') }}"
                alt="logo"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cosmologies.index') }}">کیهان شناسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aerospaces.index') }}">مهندسی هوافضا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('biologys.index') }}">زیست شناسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('physics.index') }}">فیزیک</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ورود</a>
                </li>
            </ul>
        </div>
    </div>
</nav>