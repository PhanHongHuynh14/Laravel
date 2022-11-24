@extends('layouts.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('../../css/style.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($user))
        <form class="container-fluid" action="{{ route('admin.user.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create User</h3>
                @else
                    <form class="container-fluid" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="d-flex justify-content-between">
                            <h3>Edit level</h3>
    @endif
    <a href=" {{ route('admin.user.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>

    <div class="row">
        @if(!empty($user))
            <div class="container-fluid">
                <p class="form-label">ID</p>
                <p class="form-control">{{ $user->id}}</p>
            </div>
        @endif

        <div class="container-fluid">
            <label for="code" class="form-label">Code</label>
            <input name="code" class="form-control mb-2 @error('code') is-invalid @enderror"
                type="text" id="code" placeholder="" value=" {{ old('code', $user->code ?? '' )}}">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong> {{$message}} </strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="name" class="form-label">Name</label>
            <input name="name" class="form-control mb-2 @error('name') is-invalid @enderror"
                type="text" id="name" placeholder="" value=" {{ old('name', $user->name ?? '' )}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong> {{$message}} </strong>
                </span>
            @enderror
        </div>

        <div class="container-fluid">
            <label for="email" class="form-label"> Email</label>
            <input name="email" class="form-control mb-2 @error('email') is-invalid @enderror"
                type="text" id="email" placeholder="" value=" {{ old('email', $user->email ?? '')}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message}}</strong>
                </span>
            @enderror
        </div>

        <div class="container-fluid">
            <label for="password" class="form-label"> Password</label>
            <input name="password" class="form-control mb-2 @error('password') is-invalid @enderror"
                type="password" id="password" placeholder="" value=" {{ old('password', $user->password ?? '')}}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message}}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="type" class="form-label">Type</label>
            <input name="type" class="form-control mb-2 @error('type') is-invalid @enderror"
                type="text" id="type" placeholder="" value=" {{ old('type', $user->type ?? '')}}">
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message}}</strong>
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
