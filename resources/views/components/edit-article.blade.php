<div class="card">
    <div class="card-header text-center">ویرایش مقاله</div>

    <div class="card-body">
        <form method="POST" {{ $route }} enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="row mb-3">
                <label for="title" class="col-md-2 col-form-label text-md-start">عنوان</label>

                <div class="col-md-10">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        name="title" {{ $articleTitle }} autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="abstract" class="col-md-2 col-form-label text-md-start">خلاصه</label>

                <div class="col-md-10">
                    <textarea id="abstract" rows="10" type="text" class="form-control @error('abstract') is-invalid @enderror"
                        name="abstract" autocomplete="abstract" autofocus> {{ $articleAbstract }}</textarea>

                    @error('abstract')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="body" class="col-md-2 col-form-label text-md-start">متن</label>

                <div class="col-md-10">
                    <textarea id="body" rows="20" type="text" class="form-control @error('body') is-invalid @enderror"
                        name="body" autocomplete="body" autofocus> {{ $articleBody }}</textarea>

                    @error('body')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- <div class="row mb-3">
                <label class="col-md-2 col-form-label text-md-start">تصویر شاخص
                    قبلی</label>
                <div class="col-md-10">
                    <img {{$src}} alt="">
                </div>
            </div> --}}

            <div class="row mb-3">
                <label for="indicator-img" class="col-md-2 col-form-label text-md-start">تصویر
                    شاخص جدید</label>

                <div class="col-md-10">
                    <input id="indicator-img" type="file"
                        class="form-control @error('indicator_img') is-invalid @enderror" name="indicator_img"
                        value="{{ old('indicator-img') }}" autocomplete="indicator-img" autofocus>

                    @error('indicator_img')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0 mt-5">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary">
                        ویرایش
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
