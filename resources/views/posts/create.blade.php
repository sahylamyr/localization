@extends('layouts.main')



@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6 mx-auto">
            <form action="{{ route('posts.store') }}" method="POST" class="">
                @csrf
                <div class="form-group mb-4">
                    <label for="" class="form-label">Author @error('author')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" placeholder="author" name="author" value="{{ old('author') }}"
                        class="form-control form-control-sm">
                </div>
                <div class="form-group mb-4">
                    <label for="" class="form-label">Title @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" placeholder="title" name="title" value="{{ old('title') }}"
                        class="form-control form-control-sm">
                </div>
                <div class="form-group mb-4">
                    <label for="" class="form-label">Description @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <textarea name="content" id="" class="form-control" rows="10" placeholder="content"></textarea>
                </div>

                <button class="btn btn-primary mt-4">@lang('buttons.create')</button>
            </form>
        </div>

    </div>
    <br>
    <br>
    <br>
@endsection
