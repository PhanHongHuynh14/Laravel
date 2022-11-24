@extends('layouts.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($skill))
        <form class="container-fluid" method="post" action="{{ route('admin.skill.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Skill</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('admin.skill.update', $skill->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Skill</h3>
    @endif
    <a href="{{ route('admin.skill.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="row">
            @if (!empty($skill))
                <div class="container-fluid">
                    <p for="id" , class="form-label">ID</p>
                    <p class="form-control">{{ $skill->id }}</p>
                </div>
            @endif

            <div class="container-fluid">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror"
                    id="name" placeholder="" value="{{ old('name', $skill->name ?? '') }}">
                @error('name')
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
