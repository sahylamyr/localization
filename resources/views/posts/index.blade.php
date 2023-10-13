@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">Languages</div>
                <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Create</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $post->author }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td width="10">
                                <div class="">
                                    <div class="d-flex">
                                        <a href="{{ route('posts.editPost', [$post, $language]) }}"
                                            class="btn btn-warning btn-sm me-2">
                                            Translate
                                        </a>
                                        <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                        <form action="{{ route('languages.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Trash</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <div class="alert alert-info">
                                Don't craeted any post
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
