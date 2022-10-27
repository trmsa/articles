<p class="py-4 text-center">جدیدترین مقالات منتشر شده</p>
    <div class="card-group mt-4">
        <div class="container">
            <div class="row g-4">

                @foreach ($lateAerospaces as $aerospace)
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{ $aerospace->indicator_img }}">
                            <div class="card-body card-main">
                                <h4 class="card-title">{{ $aerospace->title }}</h4>
                                <p class="card-text">{{ Str::limit($aerospace->abstract, 300, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="data">ایجاد شده در تاریخ : {{ $aerospace->created_at }}</p>
                                <p class="data">ویرایش شده در تاریخ : {{ $aerospace->updated_at }}</p>
                            </div>
                            <a href="{{ route('aerospaces.show', ['aerospace' => $aerospace->id]) }}" class="btn btn-sm btn-primary">نمایش</a>
                        </div>
                    </div>
                @endforeach

                @foreach ($lateBiologies as $biology)
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{ $biology->indicator_img }}">
                            <div class="card-body card-main">
                                <h4 class="card-title">{{ $biology->title }}</h4>
                                <p class="card-text">{{ Str::limit($biology->abstract, 300, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="data">ایجاد شده در تاریخ : {{ $biology->created_at }}</p>
                                <p class="data">ویرایش شده در تاریخ : {{ $biology->updated_at }}</p>
                            </div>
                            <a href="{{ route('biologys.show', ['biology' => $biology->id]) }}" class="btn btn-sm btn-primary">نمایش</a>
                        </div>
                    </div>
                @endforeach

                @foreach ($lateCosmologies as $cosmology)
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{ $cosmology->indicator_img }}">
                            <div class="card-body card-main">
                                <h4 class="card-title">{{ $cosmology->title }}</h4>
                                <p class="card-text">{{ Str::limit($cosmology->abstract, 300, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="data">ایجاد شده در تاریخ : {{ $cosmology->created_at }}</p>
                                <p class="data">ویرایش شده در تاریخ : {{ $cosmology->updated_at }}</p>
                            </div>
                            <a href="{{ route('cosmologies.show', ['cosmology' => $cosmology->id]) }}" class="btn btn-sm btn-primary">نمایش</a>
                        </div>
                    </div>
                @endforeach

                @foreach ($latePhysics as $physic)
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{ $physic->indicator_img }}">
                            <div class="card-body card-main">
                                <h4 class="card-title">{{ $physic->title }}</h4>
                                <p class="card-text">{{ Str::limit($physic->abstract, 300, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="data">ایجاد شده در تاریخ : {{ $physic->created_at }}</p>
                                <p class="data">ویرایش شده در تاریخ : {{ $physic->updated_at }}</p>
                            </div>
                            <a href="{{ route('physics.show', ['physic' => $physic->id]) }}" class="btn btn-sm btn-primary">نمایش</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>