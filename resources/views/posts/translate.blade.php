@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="col-sm-12 mx-auto mb-5">
                <div class="">
                    @foreach ($languages as $lang)
                        <a class="btn btn-primary"
                            href="{{ route('posts.editPost', [$post, 'language' => $lang]) }}">{{ $lang->code }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12  mx-auto">
                <form action="{{ route('posts.update', [$post, 'language' => $language]) }}" method="POST" class="">
                    @csrf
                    @method('PUT')
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

                    <button class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
@endsection
