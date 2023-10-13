@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('languages.options.update', $language) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Languages</div>
                    <a href="{{ route('languages.index') }}" class="btn btn-dark btn-sm">Langauges</a>
                </div>
            </div>
            <div class="card-body">

                <div class="accordion" id="accordionExample">
                    @foreach ($translations as $key => $translation)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $key }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <tbody>


                                            @foreach ($translation as $k => $v)
                                                @if (!is_array($v))
                                                    <tr class="trr">
                                                        <td>{{ $k }}</td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="translations[{{ $key }}][{{ $k }}]"
                                                                value="{{ $v }}">
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($v as $tKey => $tVal)
                                                        <tr class="trr">
                                                            <td>{{ $tKey }}</td>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="translations[{{ $key }}][{{ $k }}][{{ $tKey }}]"
                                                                    value="{{ $tVal }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
