
@extends('layouts.master')

@once
    @push('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif
@if (Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session('danger') }}
    </div>
@endif

<div class="row">
    <div class="container-fluid">
        <div>
            <h1>
                Level List
            </h1>
            <a href="{{ route('admin.level.create')}}"class="btn btn-new">Add new</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Levelnumber</th>
                    <th scope="col">Description</th>
                    <th scope="col">Color</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($levels))
                    @foreach ($levels as $key => $level)
                        <tr>
                            <td style="text-align:center">
                                <p>{{ $level->id }}</p>
                            </td>
                            <td style="text-align:center">
                                <p>{{ $level->levelnumber }}</p>
                            </td>
                            <td style="text-align:center">
                                <p>{{ $level->description }}</p>
                            </td>
                            <td style="text-align:center; background-color:{{ $level->color }}">
                                <p>{{ $level->color }}</p>
                            </td>

                            <td style="text-align:center">
                                <a href="{{ route('admin.level.edit', $level->id) }}"class="btn btn-primary">Edit</a>
                                <form class="d-inline" action="{{ route('admin.level.destroy', $level->id) }}"method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    {{ $levels->links() }}
</div>
@endsection
