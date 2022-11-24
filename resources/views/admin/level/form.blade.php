
@extends('layouts.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('../css/style.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($level))
        <form class="container-fluid" method="post" action="{{ route('admin.level.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create level</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('admin.level.update', $level->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit level</h3>
    @endif
    <a href="{{ route('admin.level.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="row">
            @if (!empty($level))
                <div class="container-fluid">
                    <p for="id" , class="form-label">ID</p>
                    <p class="form-control">{{ $level->id }}</p>
                </div>
            @endif

            <div class="container-fluid">
                <label for="levelnumber" class="form-label">Levelnumber</label>
                <input name="levelnumber" type="text" class="form-control mb-2 @error('levelnumber') is-invalid @enderror"
                    id="levelnumber" placeholder="" value="{{ old('levelnumber', $level->levelnumber ?? '') }}">
                @error('levelnumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="description" class="form-label">description</label>
                <input name="description" type="text" class="form-control mb-2 @error('description') is-invalid @enderror"
                    id="description" placeholder="" value="{{ old('description', $level->description ?? '') }}">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="color" class="form-label">Color</label>
                <input name="color" type="text" class="form-control mb-2 @error('color') is-invalid @enderror"
                    id="color" placeholder="" value="{{ old('color', $level->color ?? '') }}">
                @error('color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
    </form>
@endsection
