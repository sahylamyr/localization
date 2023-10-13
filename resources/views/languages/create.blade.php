@extends('layouts.main')



@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6 mx-auto">
            <form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data" class="">
                @csrf
                <div class="form-group mb-4">
                    <label for="" class="form-label">Name @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" placeholder="name" name="name" value="{{ old('name') }}"
                        class="form-control form-control-sm">
                </div>
                <div class="form-group mb-4">
                    <label for="" class="form-label">Code @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" placeholder="code" name="code" value="{{ old('code') }}"
                        class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Flag</label>
                    <input type="file" class="form-control form-control-sm">
                </div>
                <button class="btn btn-primary mt-4">@lang('buttons.create')</button>
            </form>
        </div>
    </div>
@endsection
