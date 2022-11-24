@extends('layouts.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('../../css/style.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($skillMatrix))
        <form class="container-fluid" action="{{ route('admin.skillMatrix.store') }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create skillMatrix</h3>
                @else
                    <form class="container-fluid" action="{{ route('admin.skillMatrix.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit skillMatrix</h3>
    @endif
    <a href=" {{ route('admin.skillMatrix.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>

    <div class="row">
        @if (!empty($skillMatrix))
            <div class="container-fluid">
                <p for="id" , class="form-label">ID</p>
                <p class="form-control">{{ $skillMatrix->id}}</p>
            </div>
        @endif


        <div class="container-fluid">
            <label for="code" class="form-label">Code</label>
            <input name="code" class="form-control mb-2 @error('code') is-invalid @enderror" type="text"
                id="code" placeholder="" value=" {{ old('code', $skillMatrix->code ?? '') }}">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message }} </strong>
                </span>
            @enderror
        </div>

        <div class="container-fluid">
            <label for="name" class="form-label">Name</label>
            <input name="name" class="form-control mb-2 @error('name') is-invalid @enderror" type="text"
                id="name" placeholder="" value=" {{ old('name', $skillMatrix->name ?? '') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message }} </strong>
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
