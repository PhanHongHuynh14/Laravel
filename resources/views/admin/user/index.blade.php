@extends('layouts.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('../../css/style.css') }}" type="text/css">
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
                <h1>Create User</h1>
                <a href="{{ route('admin.user.create') }}" class="btn btn-new">Add new</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Type</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($users))
                        @foreach ($users as $key => $user)
                            <tr>
                                <td style="text-align:center">{{ $user->code }}</td>
                                <td style="text-align:center">{{ $user->name }}</td>
                                <td style="text-align:center">{{ $user->email }}</td>
                                <td style="text-align:center">{{ $user->password }}</td>
                                <td style="text-align:center">{{ $user->type }}</td>
                                <td style="text-align:center">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.user.destroy',$user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Are you sure')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection
