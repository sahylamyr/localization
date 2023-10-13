@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">Languages</div>
                <a href="{{ route('languages.create') }}" class="btn btn-success btn-sm">Create</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                        <th>Short_Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($languages as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td width="10">
                                <div class="">
                                    <div class="d-flex">
                                        <a href="{{ route('languages.options', $item) }}"
                                            class="btn btn-warning btn-sm me-2">
                                            Options
                                        </a>
                                        <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                        <form action="{{ route('languages.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">@lang('buttons.trash')</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <div class="alert alert-info">
                                Don't craeted any language
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
