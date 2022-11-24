@extends('layouts.master')


@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('../css/style.css') }}" type="text/css">
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
                <h1>SkillMatrix List</h1>
                {{-- <a href=" {{ route('admin.skillMatrix.create') }}" class="btn btn-new">Add New</a> --}}
            </div>

            <div class="col-md-9">
                <button style="float: right; left:195px; top:-55px" type="button" class="btn btn-primary"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Modal
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group date mr-4" id="datetimepicker1" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#datetimepicker1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text" style="height: 100%"><i
                                                    class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker1" />
                                    </div>
                                    <div class="input-group date mr-4" id="datetimepicker2" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#datetimepicker2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text" style="height: 100%"><i
                                                    class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker2" />
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" style="width:120px" class="btn btn-primary">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        @if (!empty($skills))
                            @foreach ($skills as $skillMatrix)
                                <th class="rotate" scope="col ">{{ $skillMatrix->name }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($users))
                        <?php
                        $STT = 0;
                        ?>

                        @foreach ($users as $user)
                            <tr>
                                <td style="text-align:center">
                                    <p>{{ $user->id }}</p>
                                </td>
                                <td style="text-align:center">
                                    <p>{{ $user->code }}</p>
                                </td>
                                <td style="text-align:center">
                                    <p>{{ $user->name }}</p>
                                </td>

                                @for ($i = 1; $i <= 6; $i++)
                                    <td>
                                        <select data-toggle="modal" name="" id="select-bg{{ $STT++ }}{{ $i }}"
                                            onchange="$('#exampleModal').show('modal');">
                                            <option value="" disabled selected hidden>- </option>
                                            @if (!empty($levels))
                                                @foreach ($levels as $key => $level)
                                                    <option data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        value="" title="{{ $level->color }}"
                                                        {{ $level->id == $level->level_id ? 'selected' : '' }}>
                                                        {{ $level->levelnumber }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
        </div>
    </div>

@endsection
