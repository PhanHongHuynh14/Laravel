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
                    Skill List
                </h1>
                <a href="{{ route('admin.skill.create') }}"class="btn btn-new">Add new</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($skills))
                        @foreach ($skills as $key => $skill)
                            <tr>
                                <td style="text-align:center"><p>{{ $skill->id }}</p></td>
                                <td style="text-align:center"><p>{{ $skill->name }}</p></td>
                                <td style="text-align:center">
                                    <a href="{{ route('admin.skill.edit', $skill->id) }}"class="btn btn-primary">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.skill.destroy', $skill->id) }}" method="post">
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
        {{$skills->links()}}
</div>
@endsection
